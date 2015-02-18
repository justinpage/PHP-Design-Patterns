Repository Pattern
==================
This is a kind of an unusual pattern. This is the only pattern not covered by
the Robert C. Martin series. A repository is a pattern that offers the glue
between factories and gateways. The repository works with both the interface of
a gateway and factory. This helps our clients persist and retrieve data.

In the case of querying for data and information, is as follows:

**Repository Pattern**
![Repository Pattern][repo-pattern]
[repo-pattern]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/0ae7bdbc7d8ce419a287508e617532d8c37edda7/notes/images/07_repository_pattern.svg

The client will do a query for an object to the repository. The repository will
then talk to the gateway object. It will then provide all the information from a
database or a file. This is all the information the factory needs and therefore
will obtain the info needed by the client.

However, if you wish to use the repository to persist objects, then you need to
have the client talk to the factory for a real object. Then the client can
persist it and add the object to the repository. It will persist the data
through the gateway. This done through the repository channel upstream to the
gateway. In some situations, the gateway can have real objects, but transforming
them in real-data is common practice:

![Repository Pattern via persistence][repo-pattern-pers]
[repo-pattern-pers]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/07_02_repository_pattern.svg

The second implementation above will be an exercise in which the client directly
interacts with the factory and sends that object to the repository for the
gateway to persist it.

Let's begin by analyzing the implementation of such data. The following example
will allow us to query and obtain information from a product. We use the
repository to work with both the factory and the gateway. We first create a
private variable to remember our factory and gateway product. We then create a
constructor that will remember an instance of both the factory and the gateway
pattern. If we need to find all product types, we first create an array of all
types that will then call a retrieval from the gateway. Remember, the gateway
allows us to call an instance of the type to bring back an object of types.
Here, it should be complicated logic returning all the targeted types that we
wish to obtain from the gateway. This may be a database or in-memory information
--remember, this queries for data, not directly creating objects.

```php
<?php

require_once './TypesFactory.php';
require_once './TypesGateway.php';

class ProductTypes
{
	private $factory;
	private $gateway;

	public function __construct(TypesFactory $factory, TypesGateway $gateway)
	{
		$this->factory = $factory;
		$this->gateway = $gateway;
	}

	public function findAll()
	{
		$allTypes = [];
		$allTypes = $this->gateway->retrieveAllTypes();

		return $this->makeAllForTypes($allTypes);
	}

	public function findComputerHardware()
	{
		$allTypes = $this->gateway->retrieveAllTypes();
		$hardwareTypes = array_filter($allTypes, function($item) {
			return $item['group'] === 'ComputerHardware';
		});

		return $this->makeAllForTypes($hardwareTypes);
	}

	private function makeAllForTypes($allTypes)
	{
		$types = [];

		foreach ($allTypes as $typeData) {
			$types[] = $this->factory->makeForm($typeData);
		}

		return $types;
	}
}
```

```php
<?php

class TypesGateway
{
	function retrieveAllTypes() {
		// Here should be complicated logic returning all the targeted types
	}
}
```

Now once we retrieve all our data, we then call our private function of making
all types we retrieved, which will create the persistent data into an object!
Within the `makeAllForTypes` method, we have an internal array that will
contain each type of data. We make each type of data via our factory object.
This will call the factories `makeForm` method. This will send each available
data that was found within the types array. Now jumping to the factory class, we
need to check to see if any data is available or if nothing was giving. In this
case, we return null. Else, we will return a new instance of the product type.
Sending through the array data that is needed. This includes the product's
category, name, and code.

```php
<?php

require_once './ProductType.php';

class TypesFactory
{
	function makeFrom($typeData = [])
	{
		if (empty($typeData)) return null;

		return new ProductType (
			$typeData['category'], $typeData['name'], $typeData['code']);
	}
}
```

As we can see, the factory methods sole responsibility is to create the object.
Within the construction of the product type itself, we assign its own properties
of the category, name, and code. Each object also has a magic method of `get`.
This method will take the property method that you ask for, make sure it is set
or it will throw an error. This sort of a double-check for when you request data
from a type of data that may not exist.

```php
<?php

class ProductType
{
	private $category;
	private $name;
	private $code;

	public function __construct($category, $name, $code)
	{
		$this->category = $category;
		$this->name = $name;
		$this->code = $code;
	}

	function __get($typeProperty) {
		if (!isset($this->$typeProperty)) {
			throw new Exception ('No such property');
		}
		return $this->$typeProperty;
	}
}
```

Jumping back to our Product Type Repository Pattern, once we make an object,
it's pushed in an object array type. We can then return types. This will then be
returned by that `findAll` method. In turn, we will have an array of objects
that where persisted by the gateway pattern and made through the factory
pattern.

But what if we didn't want to find ALL the persisted data? What if we wanted to
find only a certain group of product types? We take the `findComputerHardware`
method for example. We retrieve all types from the gateway as before. The
difference, however, is we filter the array from all types down to a certain
item group that is computer hardware. This is done through a closure.

In the grand scan, we have the business logic, factories, and gateways talking
with persistence. The repositories do not hold a list of objects. They only
offer a breach between the factories and gateways. That is, a custom query
language available for filtering different types of objects. There may be
different persistence functions in order to persist objects that no gateway nor
factory could understand.

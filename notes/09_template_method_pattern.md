Template Method Pattern
=======================
This is one of those patterns that you can see everywhere. The main concept is
to provide a common place where code lives and dies by DRY (Don't Repeat
Yourself). The template pattern uses an abstract method that is being
implemented by other classes that extend it. You cannot instantiate an abstract
class, but you do have the option to extend it.

**Template Method Pattern**
![template][Template]


Think of the name. You're using an abstract template to encourage DRY coding.
Let us start with our abstract method. This will contain two methods available
to all classes that extend it. Keep in mind that `$this` will reference the
instance of the object that calls the method. Thus, we can take advantage of
using these methods in both implementations. 

Consider, for example, our inventory and payment providers. They  are just
objects that probably would be injected through a constructor. As a result, we
could call the `removeFromInventory` or the `retrievePayment` method from
either implementation.  This is because one will call a removal of that
particular object or the retrieval of a price from a particular object. In both
cases, it allows us the ability to use both the service and selling of a
product.

**Abstract class of Sale**
```php
<?php

abstract Sell
{
	// imaginary class that can remove products
	private $inventory;
	private $paymentProvider;

	public function removeFromInventory()
	{
		$this->inventory->remove($this);
	}

	public function retrievePayment()
	{
		$this->paymentProvider->retrieve($this->price);
	}
}
```

The only difference between one class that sells products and one that sells a
service is its custom methods. For selling products, we call a provider object
to order a new item. Whereas, a service, is not an item but must use human
resources. Thus, we are using a particular human resource and marking it. The
most important thing to grab from this is not to repeat yourself. However, using
an abstract method does offer some challenges. You are coupling an abstract
class with the selling of the products as well as a service. You may consider
other approaches if you cannot be sure these methods are universal through each
extension.

**Sell Products Class**
```php
<?php

require_once 'Sell.php';

class SellProducts extends Sell
{
	private $price;
	private $provider;

	public function orderNewItem()
	{
		$this->provider->orderNewItems($this);
	}
}
```

**Sell Services**
```php
<?php

require_once 'Sell.php';

class SellServices implements Sell
{
	private $price;
	private $humanResources;

	public function markHumanResourcesAsOccupied()
	{
		$this->humanResources->mark(2);
	}
	function function_name(argument) {
		// body...
	}
}
```

[Template]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/11_template_method_pattern.svg

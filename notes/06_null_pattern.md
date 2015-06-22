Null Pattern
============
One of the most interesting patterns is the Null Pattern. Before we delve into
this pattern, let us look at the behavior of null.

Within our PHP Unit Test Case, we will test the Null Object Pattern. We test the
null behavior by running a few tests and come to the following conclusions:

- Null added to an integer results like 0 + 2
- Same thing goes for when concatenating a null value against a string.
- Null does equal zero and it is less than negative 1
- We can assert that null and false are false
- Null is a false condition which proves true in our ternary operation
- When we assert that null is an object, it is false. Null is not an object.

```php
class NullObjectPatternTest extends PHPUnit_Framework_TestCase
{
	function testNullBehavior()
	{
		$this->assertEquals(2, null + 2);
		$this->assertEquals('nothing', null . 'nothing');

		$this->assertTrue(null == 0);
		$this->assertTrue(null < -1);

		echo (null) ? "inside" : "outside";

		$this->assertFalse(is_object(null));
	}
}
```

In this example, we will provide a null object. This will have all the methods
implemented through the interface. But instead of providing real values, it will
provide something we consider zero. Price will be zero, descriptions is empty,
and an image link will be empty.

**Null Pattern**
![Null Pattern][null-pattern]
[null-pattern]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/08_null_pattern.svg

The advantage of the Null Pattern allows us to safely consider illegitimate
objects that are available. In many ways, its a default object to be returned if
none others are found. You may want to implement the repository pattern if you
find yourself having to constantly ask your client whether they are checking
to see if a certain object has returned.

First, within our test, we create a new object of `Reciept`. This receipt object
has the ability to add products by an identifier and a product's price to the
total price of the receipt. Finally, we have the ability to get the total price
on the receipt. Now jumping back to the PHP Unit Test Case, we then create a new
object of `Keyboard`. That object allows us to get a description, a picture, and
a price. Back to our test case, we then call to add that product's total to the
receipt. Within the receipt, we type-hint that our expected product should be of
type product --this is where we guarantee a binding of the product to contain a
price. We then concatenate this value to the product total. We assert this value
equals fifty --which it does.

```php
class NullObjectPatternTest extends PHPUnit_Framework_TestCase
{
	function testReceiptCanAddProductsToItTotal()
	{
		$receipt = new Receipt();

		$product = new Keyboard();
		$receipt->addToTotal($product);
		$receipt->addProductById(1);

		$this->assertEquals(50, $receipt->getTotalPrice());

	}
}
```


```php
<?php

require_once __DIR__ . '/../02_Factory_Pattern/Product.php';
require_once 'ProductProvider.php';

class Receipt
{
	private $total;

	function addProductById($id)
	{
		$provider = new ProductProvider();
		$product = $provider->findProduct($id);
		$this->addToTotal($product);
	}

	// the interface product guarantees that there is a getPrice
	// method. However, this is does not help us or assuring
	function addToTotal(Product $product)
	{
		$this->total += $product->getPrice();
	}

	function getTotalPrice() {
		return $this->total;
	}
}
```

Now this is all fine and dandy, but what if we wanted to add a product by id? We
know we can find a product and add it by an id of zero for keyboard. But what if
one does not exist? This will result in an error because a null value would be
returned because it is not an object. As proven above, null is not an object

When we get a product by identifier, we first create a new product service
provider. This service provider can be a gateway, a repository, or database
access layer --it doesn't really matter. It is a service provider that allows
the creation of objects. When we create this object we have access to finding a
product by the provider. Now this is where the Null Pattern comes into play. We
check to see what that identifier is. Zero obviously means a keyboard object
must be created, if not, then we create a null product. This allows fall-back,
because we are providing some sort of default for the service provider. Instead
of having our tests fail, we have an alternative fall back that explains where
something may not exist.

```php
<?php
require_once 'NullProduct.php';

/**
 * Provides products of different types
 * This may be a gateway, a repository or a database access layer. Doesn't matter
 */
class ProductProvider
{
	function findProduct($id)
	{
		// see if the identifier matches a certain instance
		if($id === 0) return new Keyboard();

		return new NullProduct();
	}
}
```
```php
<?php

// this is neutral from the logical point of view
// because it isn't using null
class NullProduct implements Product
{
	public function getDescription()
	{
		return '';
	}

	public function getPicture()
	{
		return '/img/default.png';
	}

	public function getPrice()
	{
		return 0;
	}

}
```

If we happen to be returned a Null Product, it won't affect the total price of
the Receipt's total. But in the case of a normal product object, it will.

The Null pattern is effective for providing a fall back design if the client
interacts with our application and encounters invalid objects --one that doesn't
exist. This provides an easy way to implement any sort of logic behind the
scenes while providing fall-back.

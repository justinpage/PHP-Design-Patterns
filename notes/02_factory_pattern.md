The Factory Pattern
===================
This pattern allows us to separate the actions of one product from another.
That is, the separation of concern from multiple classes. This allows us to
decouple the necessary objects and methods from one class to another. Moreover,
this allows each method be concern with one action. The factory pattern
encourages single responsibility. By doing so, we recognize that this pattern is
good when the object doesn't have to reuse an object nor does it have to be
concern how it creates another object.

The factory method begins with us creating a `ShoppingCart` class. We create a
products in cart array as well as a private variable to inject an instance of
dependency. Our constructor, when creating the shopping cart, allows us to
create a new instance of the Product Factory. This allows us to separate the
concern of adding products to the factory and not the constructor itself.

Our add method, when called, is only concern for receiving the product
identifier. This will then be used to make a product via identifier. Once the
product is made, it's object will return an instance to be stored in the
shopping cart array. Separation of concern that leads to decoupling.

```php
<?php

class ShoppingCart
{
	private $productsInTheCart = [];
	private $productFactory

	public function __construct()
	{
		$this->productFactory = new ProductFactory();
	}

	function add($productId) {
		$this->productsInTheCart[] = $this->productFactory->make($productsId);
	}

}
```

The Product Factory is where we will begin to create the object, this is the
factory pattern. We determine whether the identifier is a keyboard or mouse. Our
private method will check and return a boolean value depending if the product
identifier begins with `k` for keyboard. We create a mouse if it isn't
available. 

```php
<?php

class ProductFactory
{
	function make($productId) {
		if ($this->isKeyboard($productId)) {
			return new Keyboard();
		}
		return new Mouse();
	}

	private function isKeyboard($productId) {
		return substr($productId, 0, 1) == 'k';
	}

}
```
Now both products implements the product interface. Therefore binding the
contract that both classes have against the definition of what a product is:

```php
<?php

interface Product
{
	function getPrice();
	function getPicture();
	function getDescription();
}
```

The mouse class is very similar to keyboard except mouse does not contain any
definitions for it's methods methods that it implements.

```php
<?php

class Keyboard implements Product
{
	public function getDescription()
	{
		return "simple description";
	}

	public function getPicture()
	{
		return null;

	}

	public function getPrice()
	{
		return 50;
	}
}
```

```php
<?php

class Mouse implements Product
{
	public function getDescription()
	{
	}

	public function getPicture()
	{
	}

	public function getPrice()
	{
	}
}
```

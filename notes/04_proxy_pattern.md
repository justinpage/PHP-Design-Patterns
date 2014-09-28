Proxy Pattern
=============
A Pattern that will silently retrieve and create the necessary pieces to
delegate the call to the newly created object. We will introduce another level
of abstraction. Every cart object will depend on an interface. A cart proxy will
check if an object exist, if not, then retrieve it. It will provide the proper
response and thus the user doesn't know it's not directly the cart object.

**Proxy Pattern**
![Proxy Pattern](https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/b40f0a3ac39930bdf2c43055f9934b5d11050f4d/notes/images/06_proxy_pattern.svg)

To begin, we have an interface that binds the contract between the Cart, the
Cart Proxy, and the Shopping Cart. The importance is separating the persistence
layer of the database retrieval and that of the cart itself from the business
logic.

```php
<?php

interface Cart
{
	function getProducts();
}
```

Our shopping cart itself will deal with persistence by grabbing the products
through database or memory. But it is our proxy that handles the direct logic.

```php
<?php

class ShoppingCart implements Cart
{
	private $products;

	public function getProducts()
	{
		return $this->products;
	}
}
```

Next, within our proxy, we define the actual logic and safe guard our instances
through a slight different implementation of another pattern, the singleton
pattern. But, for now, we will cover the logic behind the proxy. When the Cart
Proxy us used by another object, we are using a new instance or a recently
created instance of a cart. Notice that we check to make sure that the shopping
cart is empty. If it is, we create a new instance. From here, we could use a
gateway pattern to further abstract the implementation of the interface itself.
Thus we are separating our persistence layer further. But this may be overkill.
If an instance already exists, then return that already existing object.
Specifically, we return the call of getting a product.

```php
<?php

require_once './ShoppingCart.php';

class CartProxy implements Cart
{
	private $shoppingCart;

	public function getProducts()
	{
		// retrieve a cart from a database or network -> persistance
		if (is_null($this->shoppingCart)) {
			$this->shoppingCart = new ShoppingCart();
		}
		// the instance is retained as long as the proxy exists
		return $shoppingCart->getProducts();
	}
}
```

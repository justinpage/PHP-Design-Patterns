Gateway Pattern
===============
The gateway pattern allows for persistence as well as separation of concern from
the main application. The gateway pattern provides the separation of interacting
with a specific type of object and its actual implementation.

**Gateway Pattern**
![Gateway Pattern](https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/05_gateway_pattern.svg)

Within our Shopping History Class, we want to keep a record of history for all
our carts. To do this, our constructor will accept either a file or memory cart
--both are of type cart gateway. These objects allow for persistence, retrieval
of current data, and getting the identifier of a recorded cart. Notice, however,
that it isn't the concern of the gateway nor the shopping history as to how this
actually works. We provide our own reference for both the gateway and the array
of shopping cart identifiers. When we call a shopping history by listing the
carts, we go through each shopping cart identifier provided earlier to then
retrieve information.

```php
<?php

class ShoppingHistory
{
	private $gateway;
	private $shoppingCartIds = [];

	public function __construct(CartGateway $gateway, $ids = [])
	{
		$this->gateway = $gateway;
		$this->shoppingCartIds = $ids;
	}

	function listAllCarts() {
		$shoppingCarts = [];
		foreach ($this->shoppingCartIds as $id) {
			$shoppingCarts[] = $this->gateway->retrieve($id);
		}

		return $shoppingCarts;
	}
}

```

Our interface is extremely easy to understand as each Cart will implement these
three methods.

```php
<?php

/**
 * Cart Gateway
 */
interface CartGateway
{
	function persist(ShoppingCart $cart);
	function retrieve($id);
	function getIdOfRecordedCart();
}
```

For our File Cart, we will assume that the file identifier is the actual
location of the file that serializes our our cart object. We provide an
implementation of getting the file identifier, storing a cart inside the file
cart storage, and retrieving the contents of a certain cart.

```php
<?php

class FileCart implements CartGateway
{
	private $fileId;

	public function __construct()
	{
		$this->fileId = uniqid();
	}

	public function getIdOfRecordedCart()
	{
		return $this->fileId;
	}

	public function persist(ShoppingCart $cart)
	{
		file_put_contents($this->fileId, serialize($cart));
	}

	public function retrieve($id)
	{
		return unserialize(file_get_contents($id));
	}
}
```

Our In Memory Cart works similar but assumes that we are using a private array
to keep a persistence of our cart list. We can then retrieve that identifier
again by grabbing it from the array. We can get the last recorded cart by
grabbing the last pushes cart object.

```php
<?php

class InMemoryCart implements CartGateway
{
	private $listOfCarts = [];

	public function getIdOfRecordedCart()
	{
		return end($this->ListOfCarts);
	}

	public function persist(ShoppingCart $cart)
	{
		$this->listOfCarts[] = $cart;
	}

	public function retrieve($id)
	{
		return $this->listOfCarts[$id];
	}
}
```

Looking at this at a higher level, we are providing a gateway to depend on the
interface and not directly be concerned about the implementation of each cart.
This takes advantage of interface segregation and the use of the gateway
pattern. The interface interacts with the system persistence.

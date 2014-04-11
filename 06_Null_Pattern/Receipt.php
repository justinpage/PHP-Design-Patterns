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

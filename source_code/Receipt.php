<?php
require_once __DIR__ . '/../Factory/Product.php';
require_once 'ProductProvider.php';

class Receipt {
	private $total;

	function addProductById($id) {
		$provider = new ProductProvider();
		$product = $provider->findProduct($id);
		$this->addToTotal($product);
	}

	function addToTotal(Product $product) {
		$this->total += $product->getPrice();
	}

	function getTotalPrice() {
		return $this->total;
	}

}

?>

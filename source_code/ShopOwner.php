<?php
require_once __DIR__ . '/RedRose.php';

class ShopOwner {
	private $rose;

	function __construct(Roses $rose) {
		$this->rose = $rose;
	}

	function sell() {
		$this->rose->sell();
	}

}

?>

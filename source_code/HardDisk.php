<?php
require_once __DIR__ . '/ProductSubject.php';

class HardDisk extends ProductSubject {

	private $price;

	function setPrice($price) {
		$this->price = $price;
		$this->notify();
	}

	function getPrice() {
		return $this->price;
	}
}

?>

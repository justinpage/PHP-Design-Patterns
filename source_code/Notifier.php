<?php
require_once __DIR__ . '/ProductObserver.php';
require_once __DIR__ . '/ProductSubject.php';

class Notifier implements ProductObserver{
	private $product;

	function __construct(ProductSubject $subject) {
		$this->product = $subject;
	}

	public function update() {
		$newPrice = $this->product->getPrice();
		// some kind of notification
	}
}

?>

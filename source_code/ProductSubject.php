<?php

abstract class ProductSubject {
	private $observers = array();

	function register(ProductObserver $observer) {
		$this->observers[] = $observer;
	}

	protected function notify() {
		foreach($this->observers as $observer)
			$observer->update();
	}
}
?>

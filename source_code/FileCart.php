<?php

class FileCart implements CartGateway {
	private $fileId;

	public function __construct() {
		$this->fileId = uniqid();
	}

	public function getIdOfRecordedCart() {
		return $this->fileId;
	}

	public function persist(ShoppingCart $cart) {
		file_put_contents($this->fileId, serialize($cart));
	}

	public function retrieve($id) {
		return unserialize(file_get_contents($id));
	}
}

?>

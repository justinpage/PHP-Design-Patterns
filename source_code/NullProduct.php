<?php

class NullProduct implements Product {
	public function getDescription() {
		return '';
	}

	public function getPicture() {
		return '/img/default.png';
	}

	public function getPrice() {
		return 0;
	}
}

?>

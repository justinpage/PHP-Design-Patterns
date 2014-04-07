<?php

class DiscountProvider {
	private static $instance = null;

	private function __construct() {
		// here would be some complicated init logic
	}

	static function getInstance() {
		if(self::$instance == NULL)
			self::$instance = new DiscountProvider();
		return self::$instance;
	}

	function getDiscountFor($product) {
		// it would return the discounted price as percentage
		return 30;
	}
}

?>

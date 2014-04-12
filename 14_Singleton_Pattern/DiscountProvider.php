<?php

class DiscountProvider
{
	private static $instance = null;

	// by making the constructor private, prevents public instance
	private function __construct()
	{
		// here would be some complicated init logic
	}

	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new DiscountProvider();
		}
		return self::$instance;
	}

	// getting a discount may be expensive. Do it once and get all the information
	// single instance allows this
	function getDiscount($product)
	{
		// it would return discounted price as percentage
		return 30;
	}
}

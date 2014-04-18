<?php

class Monostate
{
	// using static calls into dynamic methods`
	private static $value; // static value remains static regardless of the instance created

	function setValue($value) // dnamic function uses static value
	{
		self::$value = $value;
	}

	function getValue() // dynamic function gets static value
	{
		return self::$value;
	}
}

<?php

class Monostate {
	private static $value; // Static value

	function setValue($value) { // Dynamic function
		self::$value = $value; // Static value
	}

	function getValue() { // Dynamic function
		return self::$value; // Static value
	}
}

?>

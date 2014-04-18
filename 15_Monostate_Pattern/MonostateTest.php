<?php

require_once 'Monostate.php';

class MonostateTest extends PHPUnit_Framework_TestCase
{
	function testMonostate()
	{
		// every client could create a new object and have a single value
		// sometimes, a client should know if a value should persist.
		// if your client class isn't well named, it might not be obvious.
		$firstObject = new Monostate();
		$secondObject = new Monostate();

		$firstObject->setValue('10');

		// both test will pass because each instance is using the same
		// static value --a mono state
		$this->assertEquals(10, $firstObject->getValue());
		$this->assertEquals(10, $secondObject->getValue());

		$thirdObject = new Monostate();
		$this->assertEquals(10, $thirdObject->getValue());
		// the monostate is frequently initialized. So, if you have complex logic when
		// creating an object, using a singleton pattern is better for lazy loading
	}
}

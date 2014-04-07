<?php
require_once '../Monostate.php';

class MonostateTest extends PHPUnit_Framework_TestCase {

	function testMonostate() {
		$firstObject = new Monostate();
		$secondObject = new Monostate();

		$firstObject->setValue('10');

		$this->assertEquals(10, $firstObject->getValue());
		$this->assertEquals(10, $secondObject->getValue());

		$this->assertEquals(10, $thirdObject->getValue());

	}

}

?>

<?php

require_once 'Receipt.php';
require_once __DIR__ . '/../02_Factory_Pattern/Keyboard.php';

class NullObjectPatternTest extends PHPUnit_Framework_TestCase
{
	function testNullBehavior()
	{
		$this->assertEquals(2, null + 2);
		$this->assertEquals('nothing', null . 'nothing');

		$this->assertTrue(null == 0);
		$this->assertTrue(null < -1);

		echo (null) ? "inside" : "outside";

		$this->assertFalse(is_object(null));
	}


	function testReceiptCanAddProductsToItTotal()
	{
		$receipt = new Receipt();

		$product = new Keyboard();
		$receipt->addToTotal($product);

		$this->assertEquals(50, $receipt->getTotalPrice());

		$receipt->addProductById(1);
	}
}

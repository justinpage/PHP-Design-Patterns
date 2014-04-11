<?php

require_once 'Receipt.php';
require_once __DIR__ . '/../02_Factory_Pattern/Keyboard.php';

class NullObjectPatternTest extends PHPUnit_Framework_TestCase
{
	function testReceiptCanAddProductsToItTotal()
	{
		$receipt = new Receipt();

		$product = new Keyboard();
		$receipt->addToTotal($product);

		$this->assertEquals(50, $receipt->getTotalPrice());

		$receipt->addProductById(1);
	}
}

<?php
require_once '../Receipt.php';
require_once '../../Factory/Keyboard.php';

class NullObjectPatternTest extends PHPUnit_Framework_TestCase {

	function testNullBehavior() {
		$this->assertEquals(2, null + 2);
		$this->assertEquals('nothing', null . 'nothing');

		$this->assertTrue(null == 0);
		$this->assertTrue(null < -1);

		$this->assertFalse(null && false);
//		$this->assertFalse(null);
//		$this->assertTrue(true && null);

		if (null) // should this be false or true?
			echo 'Inside IF statement';
		else
			echo 'Inside ELSE';

//		$this->assertTrue(is_object(null));
	}

	function testReceiptCanAddProductsToItTotal() {
		$receipt = new Receipt();

		$product = new Keyboard();
		$receipt->addToTotal($product);

		$this->assertEquals(50, $receipt->getTotalPrice());

		$receipt->addProductById(1);
		$this->assertEquals(50, $receipt->getTotalPrice());
	}





}

?>

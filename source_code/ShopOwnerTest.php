<?php
require_once '../RedRose.php';
require_once '../YellowRose.php';
require_once '../ShopOwner.php';

class ShopOwnerTest extends PHPUnit_Framework_TestCase {

	function testOwnerCanSellRedRoses() {
		$redRose = new RedRose();
		$shopOwner = new ShopOwner($redRose);

		$shopOwner->sell();

		$this->assertTrue($redRose->isSold());
	}

	function testOwnerCanSellYellowRoses() {
		$yellowRose = new YellowRose();
		$shopOwner = new ShopOwner($yellowRose);

		$shopOwner->sell();

		$this->assertTrue($yellowRose->isSold());
	}

}

?>

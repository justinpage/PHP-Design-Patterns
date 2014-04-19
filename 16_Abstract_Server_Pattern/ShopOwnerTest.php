<?php

require_once 'RedRose.php';
require_once 'YellowRose.php';
require_once 'ShopOwner.php';

class ShopOwnerTest extends PHPUnit_Framework_TestCase
{
	function testOwnerCanSellRoses()
	{
		$redRose = new RedRose();
		$shopOwner = new ShopOwner($redRose);

		$shopOwner->sell();
		$this->assertTrue($redRose->isSold());
	}

	function testOwnerCanSellYellowRoses()
	{
		$yellowRose = new YellowRose();
		// all the shop owner knows is that the rose is a rose
		// not the color of the rose itself
		$shopOwner = new ShopOwner($yellowRose);
		$shopOwner->sell();

		$this->assertTrue($yellowRose->isSold());
	}
}

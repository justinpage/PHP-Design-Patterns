<?php
require_once '../Delivery.php';
require_once '../Processing.php';

class DeliveryStateTest extends PHPUnit_Framework_TestCase {

	function testItCanCreateADEliveryWithInitialState() {
		$delivery = new Delivery(new Processing());
		$this->assertEquals('Warehouse', $delivery->getCurrentLocation());
	}

	function testItCanGoFromProcessingToOnRoute() {
		$delivery = new Delivery(new Processing());
		$delivery->goNext();

		$this->assertEquals('On the train', $delivery->getCurrentLocation());
	}

	function testItCanGoFromOnRouteToDestination() {
		$delivery = new Delivery(new OnRoute());
		$delivery->goNext();

		$this->assertEquals('Final Destination', $delivery->getCurrentLocation());
	}

	function testItRemainsAtFinalDestination() {
		$delivery = new Delivery(new AtDestination());
		$delivery->goNext();

		$this->assertEquals('Final Destination', $delivery->getCurrentLocation());
	}


}

?>

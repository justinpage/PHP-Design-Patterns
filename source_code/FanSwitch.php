<?php
require_once 'Switchable.php';

class FanSwitch implements Switchable {
	function On() {
		$fan = new Fan();
		$fan->turnOn();
	}

	function Off() {
		$fan = new Fan();
		$fan->turnOff();
	}
}

?>

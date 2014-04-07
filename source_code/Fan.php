<?php

require_once 'Switchable.php';

class Fan implements Switchable {
	function turnOn() {
		return true;
	}

	function turnOff() {
		return true;
	}
}

?>

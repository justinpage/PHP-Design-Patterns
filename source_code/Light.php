<?php
require_once 'Switchable.php';

class Light implements Switchable{
	function turnOn() {
		return true;
	}

	function turnOff() {
		return true;
	}
}

?>

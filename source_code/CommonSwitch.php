<?php
require_once 'Switchable.php';

class CommonSwitch {
	private $switchable;

	public function __construct(Switchable $switchable) {
		$this->switchable = $switchable;
	}
	function On() {
		$this->switchable->turnOn();
	}

	function Off() {
		$this->switchable->turnOff();
	}
}

?>

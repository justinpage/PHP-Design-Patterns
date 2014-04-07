<?php

abstract class Observable {
	private $observers = array();

	function register($observer) {
		$this->observers[] = $observer;
	}

	private function notify($hint) {
		foreach($this->observers as $observer) {
			$observer->update($hint);
		}
	}

}

?>

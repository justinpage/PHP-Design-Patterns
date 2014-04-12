<?php

abstract class Observable
{
	private $observers = [];

	function register($observer)
	{
		$this->observers[] = $observer;
	}

	private function notify($hint)
	{
		foreach ($this->observers as $observer) {
			// called a push method
			$observer->update($hint);
		}
	}
}

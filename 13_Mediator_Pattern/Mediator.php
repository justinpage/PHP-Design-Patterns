<?php

require_once 'Observable.php';
require_once 'UserAddress.php';

class Mediator
{
	private $observerClass;
	private $affectedClass;

	function __construct(Observable $observedClass, UserAddress $affectedClass)
	{
		$this->observedClass = $observedClass;
		$this->affectedClass = $affectedClass;
		$observedClass->register($this);
	}

	function update($address)
	{
		$this->affectedClass->setAddress($address);
	}

}

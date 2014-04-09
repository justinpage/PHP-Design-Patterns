<?php

require_once './TypesFactory.php';
require_once './TypesGateway.php';

class ProductTypes
{
	private $factory;
	private $gateway;

	public function __construct(TypesFactory $factory, TypesGateway $gateway)
	{
		$this->factory = $factory;
		$this->gateway = $gateway;
	}
}

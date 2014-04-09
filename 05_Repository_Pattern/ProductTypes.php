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

	public function findAll()
	{
		$allTypes = [];
		$allTypes = $this->gateway->retrieveAllTypes();

		return $this->makeAllForTypes($allTypes);
	}

	public function findComputerHardware()
	{
		$allTypes = $this->gateway->retrieveAllTypes();
		$hardwareTypes = array_filter($allTypes, function($item) {
			return $item['group'] === 'ComputerHardware';
		});

		return $this->makeAllForTypes($hardwareTypes);
	}

	private function makeAllForTypes($allTypes)
	{
		$types = [];

		foreach ($allTypes as $typeData) {
			$types[] = $this->factory->makeForm($typeData);
		}

		return $types;
	}
}

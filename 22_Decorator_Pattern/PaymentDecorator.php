<?php

require_once 'PaymentMethod.php';

abstract class PaymentDecorator implements PaymentMethod
{
	protected $itsPaymentMethod;

	public function __construct(PaymentMethod $paymentMethod)
	{
		$this->itsPaymentMethod = $paymentMethod;
	}

	public function getDescription()
	{
		return $this->itsPaymentMethod->getDescription();
	}
}

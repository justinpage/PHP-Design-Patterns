<?php

abstract class PaymentMethod implements DirectPayment, CreditPayment
{
	abstract function approve();
	abstract function send();

	private $paymentSource;

	function setPaymentSource(PaymentSource $paymentSource)
	{
		$this->paymentSource = $paymentSource;
	}

	protected function sendImp()
	{
		$this->paymentSource->send();
	}

	protected function approveImp()
	{
		$this->paymentSource->approve();
	}
}

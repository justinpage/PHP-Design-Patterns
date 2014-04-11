<?php
require_once 'PaymentMethod';

class PayPalPayment implements PaymentMethod
{
	public function execute()
	{
	}

	public function __toString()
	{
		return 'PayPal';
	}
}

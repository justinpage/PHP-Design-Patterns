<?php
require_once 'PaymentMethod.php';

class VisaPayment implements PaymentMethod
{
	public function getDescription()
	{
		return "PaypalDescription";
	}

	function accept(PaymentVisitor $paymentVisitor)
	{
		$paymentVisitor->visit($this);
	}
}

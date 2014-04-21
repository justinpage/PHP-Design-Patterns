<?php

class PaypalPayment implements PaymentMethod
{
	public function getDescription()
	{
		return 'PaypalDescription';
	}
}

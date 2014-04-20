<?php

class DirectPaymentMethod extends PaymentMethod
{
	function approve()
	{
		return true;
	}

	function send()
	{
		parent::sendImp();
	}
}

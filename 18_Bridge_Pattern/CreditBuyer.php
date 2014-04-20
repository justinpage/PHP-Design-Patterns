<?php

class CreditBuyer
{
	function payNow(CreditPayment $payment)
	{
		if ($payment->approve()) {
			$payment->send();
		}
	}
}

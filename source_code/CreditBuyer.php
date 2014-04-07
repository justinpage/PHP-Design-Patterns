<?php

class CreditBuyer {
	function payNOw(CreditPayment $payment) {
		if($payment->approve())
			$payment->send();
	}
}

?>

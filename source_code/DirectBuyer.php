<?php

class DirectBuyer {
	function payNow(DirectPayment $payment) {
		$payment->send();
	}
}

?>

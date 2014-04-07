<?php

class CreditPaymentMethod extends PaymentMethod {

	function approve() {
		parent::approveImp();
	}

	function send() {
		parent::sendImp();
	}

}

?>

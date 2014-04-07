<?php

class PaypalPayment implements PaymentMethod {
	public function getDescription() {
		return "PaypalDescription";
	}

	function accept(PaymentVisitor $paymentVisitor) {
		$paymentVisitor->visit($this);
	}
}

?>

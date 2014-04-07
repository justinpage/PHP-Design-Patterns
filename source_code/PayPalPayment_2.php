<?php
require_once 'PaymentMethod.php';

class PayPalPayment implements PaymentMethod {
	public function execute() {

	}

	public function __toString() {
		return 'PayPal';
	}
}

?>

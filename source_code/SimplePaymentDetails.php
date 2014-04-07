<?php
require_once 'PaymentVisitor.php';

class SimplePaymentDetails implements PaymentVisitor {
	private $description;

	public function getDescription() {
		return $this->description;
	}

	public function visit(PaymentMethod $paymentMethod) {
		$this->description = $paymentMethod->getDescription();
	}
}

?>

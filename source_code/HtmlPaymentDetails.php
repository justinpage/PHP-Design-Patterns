<?php
require_once 'PaymentVisitor.php';

class HtmlPaymentDetails implements PaymentVisitor {
	private $description;

	public function getDescription() {
		return $this->description;
	}

	public function visit(PaymentMethod $paymentMethod) {
		$this->description = '<html><body><div>' .
				$paymentMethod->getDescription() .
				'</div></body></html>';
	}

}

?>

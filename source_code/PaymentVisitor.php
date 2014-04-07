<?php

interface PaymentVisitor {
	function visit(PaymentMethod $paymentMethod);
	function getDescription();
}

?>

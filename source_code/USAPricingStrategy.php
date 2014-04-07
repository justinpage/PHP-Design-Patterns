<?php

class USAPricingStrategy implements PriceCalculator {
	public function calculateTaxes($price) {
		return $price * 5 / 100;
	}

	public function convertCurrency($price) {
		return $price * 1;
	}

	public function negativeDiscount($price) {
		return -50;
	}

}

?>

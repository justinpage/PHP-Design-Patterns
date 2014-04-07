<?php

class EuropePricingStrategy implements PriceCalculator {
	function convertCurrency($price) {
		return $price * 0.70;
	}

	public function calculateTaxes($price) {
		return $price * 20 / 100;
	}

	public function negativeDiscount($price) {
		if($price > 1000)
			return -100;
		return -10;
	}


}

?>

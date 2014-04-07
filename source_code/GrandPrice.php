<?php

class GrandPrice {

	private $sellerFrom;

	function calculate($price, PriceCalculator $pricingStrategy) {
		$grandPrice = $price;
		$grandPrice += $pricingStrategy->negativeDiscount($price);
		$grandPrice += $pricingStrategy->calculateTaxes($price);
		$grandPrice = $pricingStrategy->convertCurrency($price);
		return $grandPrice;
	}



}

?>

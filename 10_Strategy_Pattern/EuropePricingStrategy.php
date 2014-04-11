<?php

class EuropePricingStrategy implements PriceCalculator
{
	function convertCurrency($price)
	{
		return $price * 0.70;
	}

	function calculateTaxes($price)
	{
		return $price * 20 / 100;
	}

	function negativeDiscount($price)
	{
		if ($price > 1000) {
			return -100;
		}
		return -10;
	}
}

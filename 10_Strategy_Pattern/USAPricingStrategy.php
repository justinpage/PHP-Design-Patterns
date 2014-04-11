<?php

class USAPricingStrategy implements PriceCalculator
{
	function convertCurrency($price)
	{
		return $price * 1;
	}

	function calculateTaxes($price)
	{
		return $price * 5 / 100;
	}

	function negativeDiscount($price)
	{
		return -50;
	}
}

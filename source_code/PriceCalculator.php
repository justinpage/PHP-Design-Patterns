<?php

interface PriceCalculator {
	function negativeDiscount($price);
	function calculateTaxes($price);
	function convertCurrency($price);
}

?>

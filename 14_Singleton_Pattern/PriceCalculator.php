<?php

class PriceCalculator
{
	function compute(Product $product)
	{
		$discountProvider = DiscountProvider::getInstance();
		$discountAsPercent = $discountProvider->getDiscount($product->getId());

		$price = $product->getPrice();
		return $price - ($price * discountAsPercent)
	}
}

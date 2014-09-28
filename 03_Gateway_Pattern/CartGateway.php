<?php

/**
 * Cart Gateway
 */
interface CartGateway
{
	function persist(ShoppingCart $cart);
	function retrieve($id);
	function getIdOfRecordedCart();
}

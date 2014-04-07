<?php

/**
 * undocumented class
 *
 * @package default
 * @author Me
 */
interface CartGateway
{
	function persist(ShoppingCart $cart);
	function retrieve($id);
	function getIdOfRecordedCart();
}

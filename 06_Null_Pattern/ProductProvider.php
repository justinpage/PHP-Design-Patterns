<?php
require_once 'NullProduct.php';

/**
 * Provides products of different types
 * This may be a gateway, a repository or a database access layer. Doesn't matter
 */
class ProductProvider
{
	function findProduct($id)
	{
		// see if the identifier matches a certain instance
		if($id === 0) return new Keyboard();

		return new NullProduct();
	}
}

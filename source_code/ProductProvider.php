<?php
require_once 'NullProduct.php';

// Provides products of different types.
// This may be a gateway, a repository or a dabatase access layer. Doesn't matter.
class ProductProvider {
	function findProduct($id) {
		if($id == 0)
			return new Keyboard ();
		return new NullProduct();
	}

}

?>

<?php

class CompositeOrder implements Order
{
	private $orders = [];

	function add(Order $order)
	{
		$this->orders[] = $order;
	}

	// multiple actions and behaviors happen behind the scene
	// very similar to an active object pattern.
	// however, the active object removed from this list
	function place()
	{
		array_walk($this->orders, function ($order) {
			$order->place();
		});
	}
}

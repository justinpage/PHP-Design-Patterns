<?php

require_once 'AtDestination.php';

class OnRoute implements DeliveryState
{
	function getLocation()
	{
		return 'On the train';
	}
	function goNext(Delivery $delivery)
	{
		$delivery->setState(new AtDestination());
	}
}

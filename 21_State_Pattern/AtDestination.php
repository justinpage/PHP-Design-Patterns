<?php

class AtDestination implements DeliveryState
{
	function getLocation()
	{
		return 'Final Destination';
	}
	function goNext(Delivery $delivery)
	{
		$delivery->setState(new AtDestination());
	}
}


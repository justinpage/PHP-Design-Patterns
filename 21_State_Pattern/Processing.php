<?php

require_once 'Delivery.php';
require_once 'DeliveryState.php';
require_once 'OnRoute.php';

class Processing implements DeliveryState
{
	function getLocation()
	{
		return 'Warehouse';
	}
	function goNext(Delivery $delivery)
	{
		$delivery->setState(new OnRoute());
	}
}

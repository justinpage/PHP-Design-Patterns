<?php

interface DeliveryState {
	function goNext(Delivery $delivery);
	function getLocation();
}

?>

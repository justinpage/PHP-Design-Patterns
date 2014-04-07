<?php
require_once 'Delivery.php';
require_once 'DeliveryState.php';
require_once 'OnRoute.php';

class Processing implements DeliveryState {
	public function getLocation() {
		return 'Warehouse';
	}

	public function goNext(Delivery $delivery) {
		$delivery->setState(new OnRoute());
	}
}

?>

<?php
require_once 'AtDestination.php';

class OnRoute implements DeliveryState {
	public function getLocation() {
		return 'On the train';
	}

	public function goNext(Delivery $delivery) {
		$delivery->setState(new AtDestination());
	}

}

?>

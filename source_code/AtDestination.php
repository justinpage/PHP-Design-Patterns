<?php

class AtDestination implements DeliveryState {
	public function getLocation() {
		return 'Final Destination';
	}

	public function goNext(Delivery $delivery) {
		$delivery->setState(new AtDestination());
	}

}

?>

<?php

class ClientFacade {

	function getAllClientData($clientID) {
		return array(
			$clientID,
			$this->ClientAddress($clientID),
			$this->getMostPayedFor($clientID),
			$this->getPaymentHistory($clientId)
		);
	}

	private function ClientAddres($clientID) {
		$clientShippingAddress = '';

		$clientPersonalData = new ClientPersonalData($clienId);
		$clientShippingAddress = $clientPersonalData->getAddress();
		$clientShippingAddress .= ',' . $clientPersonalData->getCountry();
		$clientShippingAddress .= ',' . $clientPersonalData->getPostalCode();

		return $clientShippingAddress;
	}

	private function getMostPayedFor($clientId) {
		$topPayments = new TopPayments();
		return $topPayments->findMaxForClientWithId($clientId);

	}

	private function getPaymentHistory($clientID) {
		$paymentHIstory = new PaymentHistory();
		return $paymentHIstory->findPaymentsForClient($clientId);

	}
}

?>

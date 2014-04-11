<?php

class ClientFacade
{
	function getAllClientData($clientId)
	{
		return [
			$clientId,
			$this->ClientAddress($clientId),
			$this->getMostPayedFor($clientId),
			$this->getPaymentHistory($clientId),
		];
	}

	private function ClientAddress($clientId)
	{
		$clientShippingAddress = '';

		$clientPersonalData = new ClientPersonalData($clientId);
		$clientShippingAddress = $clientPersonalData->getAddress();
		$clientShippingAddress .= ',' . $clientPersonalData->getCountry();
		$clientShippingAddress .= ',' . $clientPersonalData->getPostalCode();


		return $clientShippingAddress;
	}

	private function getMostPayedFor($clientId)
	{
		$topPayments = new TopPayments();
		return $topPayments->findMaxForClientWithId($clientId);
	}

	private function getPaymentHistory($clientId)
	{
		$paymentHistory = new PaymentHistory();
		return $paymentHistory->findPaymentsForClient($clientId);
	}
}

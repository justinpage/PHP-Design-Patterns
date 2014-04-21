<?php

require_once 'PaymentDecorator.php';

class HTMLPaymentDetails extends PaymentDecorator
{
	function getHTMLDescription()
	{
		return '<html>' . $this->itsPaymentMethod->getDescription() . '</html>';
	}
}

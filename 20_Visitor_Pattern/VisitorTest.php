<?php

require_once 'VisaPayment.php';
require_once 'PaypalPayment.php';
require_once 'SimplePaymentDetails.php';
require_once 'HTMLPaymentDetails.php';

class VisitorTest
{
	function testCanItProvideSimpleDescription()
	{
		$simpleDetails = new SimplePaymentDetails();
		$visaPayment = new VisaPayment();
		$visaPayment->accept($simpleDetails);
		$this->assertEquals('VisaDescription', $simpleDetails->getDescription());
	}

	function testCanItProvideHTMLDescription()
	{
		$HTMLDetails = new HTMLPaymentDetails();
		$visaPayment = new VisaPayment();
		$visaPayment->accept($HTMLDetails);
		$this->assertEquals('<html><body><div>VisaDescription</div></body></html>',
			$SimplePaymentDetails->getDescription());

	}
}

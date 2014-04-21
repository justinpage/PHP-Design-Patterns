<?php

require_once 'VisaPayment.php';
require_once 'HTMLPaymentDetails.php';

class DecoratorTest PHPUnit_Framework_TestCase
{
	function testItCanProvideDescription()
	{
		$visaPayment = new VisaPayment();
		$htmlDetails = new HTMLPaymentDetails();

		$this->assertEquals('VisaDescription', $htmlDetails->getDescription());
		$this->assertEquals('<html>VisaDescription</html>', $htmlDetails->getHTMLDescription());
	}
}

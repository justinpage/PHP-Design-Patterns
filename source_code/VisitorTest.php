<?php

require_once '../VisaPayment.php';
require_once '../PaypalPayment.php';
require_once '../SimplePaymentDetails.php';
require_once '../HtmlPaymentDetails.php';

class VisitorTest extends PHPUnit_Framework_TestCase {
	function testItCanProvideSimpleDescripion() {
		$simpleDetails = new SimplePaymentDetails();
		$visaPayment = new VisaPayment();

		$visaPayment->accept($simpleDetails);

		$this->assertEquals('VisaDescription', $simpleDetails->getDescription());
	}
	function testItCanProvideHtmlDescripion() {
		$htmlDetails = new HtmlPaymentDetails();
		$visaPayment = new VisaPayment();

		$visaPayment->accept($htmlDetails);

		$this->assertEquals(
				'<html><body><div>VisaDescription</div></body></html>',
				$htmlDetails->getDescription());
	}
}

?>

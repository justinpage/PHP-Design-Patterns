<?php

require_once '../VisaPayment.php';
require_once '../HtmlPaymentDetails.php';

class VisitorTest extends PHPUnit_Framework_TestCase {
	function testItCanProvideDescription() {
		$visaPayment = new VisaPayment();
		$htmlDetails = new HtmlPaymentDetails($visaPayment);

		$this->assertEquals('VisaDescription', $htmlDetails->getDescription());
		$this->assertEquals('<html>VisaDescription</html>', $htmlDetails->getHtmlDescription());
	}

}

?>

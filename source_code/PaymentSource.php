<?php

interface PaymentSource {
	function approve();
	function send();
}

?>

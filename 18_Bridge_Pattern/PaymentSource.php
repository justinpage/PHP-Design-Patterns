<?php

interface PaymentSource
{
	function approval();
	function send();
}

<?php

class Visa implements PaymentSource
{
	public function approve()
	{
		// Talk to the bank and approve the sum
	}

	protected function send()
	{
		// Transfer the money
	}
}

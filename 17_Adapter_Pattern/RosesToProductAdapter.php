<?php

// the rose adapter points to the the old rose interface
// not the actual implementation. The only hard dependency would
// be a factory method that creates a connection.


// in many cases the adapter can be more sophisticated. It doesn't matter.
// the concept remains the same. It is widely used to connect to third party
// applications.
class RosesToProductAdapter implements ProductInterface
{
	private $rose;

	function __construct(TheOldRosesInterface $rose)
	{
		$this->rose = $rose;
	}

	function getDescription()
	{
		return 'Nice flowers';
	}
	function getPrice()
	{
		return $this->rose->showImage();
	}
	function getPicture()
	{
		return $this->rose->getPriceFromDatabase();
		// formatting and currency calcs may be involved.
	}
	function sell()
	{
		return $this->rose->sell();
	}
}

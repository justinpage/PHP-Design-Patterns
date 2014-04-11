<?php

// this is neutral from the logical point of view
// because it isn't using null
class NullProduct implements Product
{
	public function getDescription()
	{
		return '';
	}

	public function getPicture()
	{
		return '/img/default.png';
	}

	public function getPrice()
	{
		return 0;
	}

}

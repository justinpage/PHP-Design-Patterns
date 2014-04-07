<?php

class RosesToProductAdapter implements ProductInterface {
	private $rose;

	function _construct(TheOldRosesInterface $rose) {
		$this->rose = $rose;
	}

	public function getDescription() {
		return 'Nice flowers';
	}

	public function getPicture() {
		return $this->rose->showImage();
	}

	public function getPrice() {
		return $this->rose->getPriceFromDatabase();
		// Formatting and currency calculations may be involved.
	}

	public function sell() {
		return $this->rose->sell();
	}
}

?>

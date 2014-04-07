<?php

class ProductType {
	private $category;
	private $name;
	private $code;

	public function __construct($category, $name, $code) {
		$this->category = $category;
		$this->name = $name;
		$this->code = $code;
	}

	function __get($typeProperty) {
		if(!isset($this->$typeProperty))
			throw new Exception ('No such property');
		return $this->$typeProperty;
	}

}

?>

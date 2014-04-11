<?php

class UploaderCommand
{
	private	$size;
	private	$chunk;
	private	$uploaded;
	private $multiUploader;

	function __construct($speed, $size, MultiFileUploader $multiUploader)
	{
		$this->size = $size;
		$this->chunk = $size / $speed;
		$this->multiUploader = $multiUploader;
	}
	function execute()
	{
		$this->uploaded += $this->chunk;
		print "\n" . $this->uploaded . '/' . $this->size;

		if ($this->uploaded < $this->size) $this->multiUploader->addUPloader($this);
	}
}

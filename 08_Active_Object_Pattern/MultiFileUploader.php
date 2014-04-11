<?php

class MultiFileUploader
{
	private $uploaders = [];

	function addUPloader(UploaderCommand $uploader)
	{
		$this->uploaders[] = $uploader;
	}

	function run() {
		while (!empty($this->uploaders)) {
			$uploader = array_shift($this->uploaders);
			$uploader->execute();
		}
	}
}

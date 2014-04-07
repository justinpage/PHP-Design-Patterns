<?php
require_once '../UploaderCommand.php';
require_once '../MultiFileUploader.php';

class MultiUploadTest extends PHPUnit_Framework_TestCase {

	function testItCanUploadMultipleFiles() {
		$multiUploader = new MultiFileUploader();

		$speed = 8; $size = 50;
		$uploaderOne = new UploaderCommand($speed, $size, $multiUploader);
		$multiUploader->addUploader($uploaderOne);

		$speed = 4; $size = 20;
		$uploaderTwo = new UploaderCommand($speed, $size, $multiUploader);
		$multiUploader->addUploader($uploaderTwo);

		$multiUploader->run();
	}

}

?>

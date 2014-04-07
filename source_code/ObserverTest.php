<?php
require_once '../Notifier.php';
require_once '../HardDisk.php';

class ObserverTest extends PHPUnit_Framework_TestCase {

	function testItCanNotify() {
		$product = new HardDisk();
		$mailNotifier = new Notifier($product);
		$product->register($mailNotifier);
	}
}

?>

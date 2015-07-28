Active Object Pattern
=====================
The active object pattern is based on the command pattern. It has one method
called run. Doing so, it runs each command it has in a link list, or in this
case, an array. A command pattern consists of an interface. Each object
implementing it is available to a client. If our active object is alive, we can
run multiple commands. In this example, we demonstrate a super easy
implementation of multiple objects handled in their own process. In many ways,
this allow our application to handle multiple processes at once. Working with
objects that have to remain active is a requirement. File uploads do just that.

**Active Object Pattern**
![active][Active]

We will follow a pattern of TDD. This means we will develop a test to output our
results as we run through each process to demonstrate an object that handles
multiple files when uploading. To simulate an upload, we will divide the current
size by the speed to indicate chunk in seconds. That chunk will be added to a
total value when we execute an upload.

Our test will first create a new multi-file-uploader that will handle our
current uploads as well as allow the process of running an upload until it is
finished. We create a custom speed and size. We send this information, as well
as the current instance of the multi-file-uploader, to the uploader command.
This uses the command pattern. Within our uploader command, we construct the
object with the information of size, speed, and chunk of data that simulates an
upload every so and so milliseconds.

**Unit Test for Multi-File Upload**
```php
<?php
require_once 'vendor/autoload.php';

class MultiUploadTest extends PHPUnit_Framework_TestCase
{
	function testItCanUploadMultipleFiles() {
		$multiUploader = new MultiFileUploader();

		$speed = 8; $size = 50;
		$uploaderOne = new UploaderCommand($speed, $size, $multiUploader);
		$multiUploader->addUPloader($uploaderOne);

		$speed = 4; $size = 20;
		$uploaderTwo= new UploaderCommand($speed, $size, $multiUploader);
		$multiUploader->addUPloader($uploaderTwo);

		$multiUploader->run();
	}
}
```

**Multi-File Uploader**
```php
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
```
We then assign our current instance of the multi-file object to our private
variable of multi-uploaders --we can keep track of current instances of our
multi-object-uploader. Once we have created the uploader command, we then add
that to our current multi-uploader object. It will store each upload process
inside a private uploaders array

**Uploader Command**
```php
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
```

Now the trick here is simple, once we create all our loaded process of uploads,
we call run. The run method will execute via our multi-file uploader. That run
method will then launch a while loop that will check the current uploader array.
to see if it is empty. If not, it will shift the next upload process in the
queue. We do this by grabbing the first object and calling its own execute
method. 

When that execute method is called from that object, it processes it because it
was created from an uploader command pattern. We then add our chunk of data, the
percentage of each time an upload takes place, to the uploaded section. We print
our current result. Now if our uploads is still less than our size, we are not
done. We push the current object process on the list and move onto the next
upload in queue. When we return, we similate the current process and thus keep
checking until we have uploaded both files.

As you can see, this gives us power to each of our objects because it allows our
application to multi-task between two active objects that contain their own
commands.

[Active]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/10_active_object_pattern.svg

Decorator Pattern
=================
The last pattern we will talk about is the *Decorator Pattern*. If you remember
the Visitor Pattern, it allowed us functionality without having to change the
classes. But it was complex. 

The decorator pattern fools the client to be using a payment method. As define
originally, however, it will use a decorator pattern. Something a client
expected but is actually provided by a PayPal or Visa payment object. This is
done by providing a reference of the payment method. In turn a display of
details will extend a decorator, allowing the default functionality and
additional features by extension.

**Decorator Pattern**
![The Decorator Pattern](https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/04_factory_pattern.svg)

In this example, we will be using TDD as a client to which it will grab a
description. Whether that description is directly provided through a callback
from the PayPal object or is also formatted is not known by the client to
actually live inside a payment method. The special payment description may be an
extension of the original decorator pattern. The client isn't concern with those
necessities. What it is concern with, is the ability to grab a description
--that's it. This features are improved through a decorator pattern that acts as
a means to decorate our expectation with extra features we might need.

We begin, as usual, with the creation of a test case that will assert the idea
of obtaining a description from an HTML payment details. We can grab the direct
description or a description wrapped in HTML tags.

```php
<?php

require_once 'VisaPayment.php';
require_once 'HTMLPaymentDetails.php';

class DecoratorTest extends PHPUnit_Framework_TestCase
{
	function testItCanProvideDescription()
	{
		$visaPayment = new VisaPayment();
		$htmlDetails = new HTMLPaymentDetails($visaPayment);

		$this->assertEquals('VisaDescription', $htmlDetails->getDescription());
		$this->assertEquals('<html>VisaDescription</html>', $htmlDetails->getHTMLDescription());
	}
}
```

We first create a new visa payment. This visa payment will be an implementation
of a payment method.

```php
<?php

interface PaymentMethod
{
	public function getDescription();
}
```

Our visa payment will return a simple string description
```php
<?php

class PaypalPayment implements PaymentMethod
{
	public function getDescription()
	{
		return 'PaypalDescription';
	}
}
```
Alternatively, you can do the same for Visa description. This is not
demonstrated because you just need to rename the class to PayPal Payment and
then return a string.

Now the payment decorator is where the design pattern can be seen. Our payment
decorator will be implementing the same interface as both the Visa Payment and
PayPal Payment class --that is, the payment method. This time, however, we will
be providing a constructor to this abstract class. An abstract class can
implement a binding contract but cannot be implemented itself --only extended.
When we create an extension of the payment decorator, it will use the
constructor to assign a reference to the payment method class. We also provide
an implementation of the description class that will call the payment method
description. Notice that this where we get the string from the delegated action
of a payment method.

```php
<?php

require_once 'PaymentMethod.php';

abstract class PaymentDecorator implements PaymentMethod
{
	protected $itsPaymentMethod;

	public function __construct(PaymentMethod $paymentMethod)
	{
		$this->itsPaymentMethod = $paymentMethod;
	}

	public function getDescription()
	{
		return $this->itsPaymentMethod->getDescription();
	}
}
```

When we create a new extension of the decorator by an HTML payment method detail
class, we provide an additional feature of an HTML tag description --it
basically calls the protected variable payment method to then return the
description. Notice that our HTML description is an extended feature, not part o
the original abstraction.

```php
<?php

require_once 'PaymentDecorator.php';

class HTMLPaymentDetails extends PaymentDecorator
{
	function getHTMLDescription()
	{
		return '<html>' . $this->itsPaymentMethod->getDescription() . '</html>';
	}
}
```

Now, when we conduct our first assertion, we are returning a delegation of our
payment method to return a description. The next assertion, the client doesn't
directly know that the HTML description is not part of the payment decorator,
but an extension of the original feature. That is why we call it a decorator
pattern. In that we can can extend features and then decorate or customize our
usability. In the second assertion, we expect a description wrapped in an HTML
tag.

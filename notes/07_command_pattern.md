Command Pattern
===============
The command pattern is simple. It defines an interface of type command with a
single method of execution. This is useful for a sensor that is waiting for an
event to occur. It just executes it. It can provide some awesome solutions
without the client ever knowing about it.

**Command Interface**
![interface][Interface]

Then, we can imagine a sensor that listens for an event to occur in order for the
implementation of an interface to execute a method base on that event.
![sensor][Sensor]

For example, we can use it to process a payment for an online web shop
application. A Process Payment class will ask a user class to provide a payment
method, this command will execute without the client knowing about it.
![payment][Payment]

Let us begin with the `ProcessPayment` class. We requiem a user, a payment
method, and a payment processing exception. We then call the process of a user
payment. This requires us to create a user object base on their username. Now
our user object has the ability to grab a payment method. This can either be set
as either as Visa or PayPal.

**Procss Payment**
```php
<?php
require_once 'User.php';
require_once 'PaymentMethod.php';
require_once 'PaymentProcessingException.php';

class ProcessPayment
{
	function processUserPayment($userName)
	{
		$user = new User($userName);
		$paymentMethod = $user->getPaymentMethod();
		$this->executePayment($paymentMethod);
	}

	private function executePayment(PaymentMethod $paymentMethod) {
		try {
			$paymentMethod->execute();
		} catch (Exception $e) {
			throw new PaymentProcessingException(
				'Paying with ' . $paymentMethod .
				' has failed with error: ' . $e->message
			);
		}
	}
}
```
**User**
```php
<?php

class User
{
	private $paymentMethod;

	function getPaymentMethod()
	{
		return $this->paymentMethod;
		// VisaPayment or PayPalPayment
	}
}
```

We call that payment method which will return an objects payment method. We then
call our private function to execute the payment base on the method provided. We
type-hint the parameter by making sure the object is of type payment method. We
then try to execute that payment method. Remember, that payment method is an
interface that bind an execution method --what that implementation does will
largely depend on whether it is PayPal or Visa.

**Payment Method Interface**
```php
<?php

interface PaymentMethod
{
	function execute();
}
```

If it is PayPal, the object will provide an implementation of the execute
method. In addition, we have a string method for our possible exceptions.

**PayPal Payment**
```php
<?php
require_once 'PaymentMethod';

class PayPalPayment implements PaymentMethod
{
	public function execute()
	{
	}

	public function __toString()
	{
		return 'PayPal';
	}
}
```

Visa Payment is very similar. The execute method would handle the complicated
logic behind paying with a Visa. This would return true or try to execute if the
payment was successful.

**Visa Payment**
```php
<?php
require_once 'PaymentMethod';

class VisaPayment implements PaymentMethod
{
	public function execute()
	{
		// here would be a lot of logic for paying
		// with visa
	}
}
```

If the payment fails, we will throw an exception that will output the current
payment methods error along with a message. Keep in mind that creating a new
payment processing requires loading it into memory and having the constructor
for the payment processing exception send its message to the parent static
constructor.


The command pattern opens a door to solving solutions in payments. All payments
are transactions that have a start point and undo settings. We could add an
undo action that would be executed on a user's request. We could use an  undo
function in many interfaces. The command object, after executing are put on a
list, the most recent is called and executed. For an undo, we would undo
whatever was on that list.

[Interface]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/09_command_pattern.svg 

[Sensor]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/09_02_command_pattern.svg

[Payment]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/09_03_command_pattern.svg


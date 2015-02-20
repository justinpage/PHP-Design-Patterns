Null Pattern
============
One of the most interesting patterns is the Null Pattern. Before we delve into
this pattern, let us look at the behavior of null.

Within our PHP Unit Test Case, we will test the Null Object Pattern. We test the
null behavior by running a few tests and come to the following conclusions:

- Null added to an integer results like 0 + 2
- Same thing goes for when concatenating a null value against a string.
- Null does equal zero and it is less than negative 1
- We can assert that null and false are false
- Null is a false condition which proves true in our ternary operation
- When we assert that null is an object, it is false. Null is not an object.

In this example, we will provide a null object. This will have all the methods
implemented through the interface. But instead of providing real values, it will
provide something we consider zero. Price will be zero, descriptions is empty,
and an image link will be empty.

**Null Pattern**
![Null Pattern][null-pattern]
[null-pattern]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/master/notes/images/08_null_pattern.svg


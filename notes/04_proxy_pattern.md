Proxy Pattern
=============
A Pattern that will silently retrieve and create the necessary pieces to
delegate the call to the newly created object. We will introduce another level
of abstraction. Every cart object will depend on an interface. A cart proxy will
check if an object exist, if not, then retrieve it. It will provide the proper
response and thus the user doesn't know it's not directly the cart object.

**Proxy Pattern**
![Proxy Pattern]()

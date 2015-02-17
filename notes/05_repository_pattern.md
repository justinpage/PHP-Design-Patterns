Repository Pattern
==================
This is a kind of an unusual pattern. This is the only pattern not covered by
the Robert C. Martin series. A repository is a pattern that offers the glue
between factories and gateways. The repository works with both the interface of
a gateway and factory. This helps our clients persist and retrieve data.

In the case of querying for data and information, is as follows:

**Repository Pattern**
![Repository Pattern][repo-pattern]
[repo-pattern]: https://cdn.rawgit.com/KLVTZ/PHP-Design-Patterns/0ae7bdbc7d8ce419a287508e617532d8c37edda7/notes/images/07_repository_pattern.svg

The client will do a query for an object to the repository. The repository will
then talk to the gateway object. It will then provide all the information from a
database or a file. This is all the information the factory needs and therefore
will obtain the info needed by the client.

However, if you wish to use the repository to persist objects, then you need to
have the client talk to the factory for a real object. Then the client can
persist it and add the object to the repository. It will persist the data
through the gateway. This done through the repository channel upstream to the
gateway. In some situations, the gateway can have real objects, but transforming
them in real-data is common practice:

![Repository Pattern via persistence][repo-pattern-pers]
[repo-pattern-pers]: 

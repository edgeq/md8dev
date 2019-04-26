# Services

> Any PHP code that performs an action
> 
> Services are useful objects. 
> 
> Services are classes that do some kind of work. (vs data-storage classes)
> 
> A service is an object that does work for me.
> 
> Service Container === Dependency Injection Container
> 
> - An associative array of every useful service object.


### From Drupal Docs

> Introduction to services

> A "service" (such as accessing the database, sending email, or translating user interface text) can be defined by a module or Drupal core. Defining a service means giving it a name and designating a default class to provide the service; ideally, there should also be an interface that defines the methods that may be called. Services are collected into the Dependency Injection Container, and can be overridden to use different classes or different instantiation by modules. 


### Drupalize Notes
> Services live in the Container. They are instructions for building connections to a given service. Drupal console is helpful... `drupal debug:container`
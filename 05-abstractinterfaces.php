<?php

// Interfaces
// 
// New keywords: interace, implements, const
// 
// New concept: type hinting
// 
// scope resolution operator is `::` (ie., this is a way to access a property
// or method from a parent scope)
//
// interface is like abstract, but it cannot contain any concrete methods or
// properties. It just says if you want to create me with a child class, you
// must make all these things. It creates a "signature" that the child class
// must follow.
// 
// Why use interface vs. abstract? Interface is more strict about making the
// child class write the functionality. Abstract class can actually contain
// function definitions and have children inherit those definitions. Interface
// forces the child class to define all functions, and doesn't hand down any
// functionality. Purely a skeleton.
// 
// You can only inherit from one abstract class, but you can implement multiple
// interfaces. This is another key difference between the two.
// 
// So you can do
// class foo extends MyAbstractClass {
// 
// }
// 
// OR
// class foo implements MyFirstInterface, MySecondInterface {
// 
// }
// 
// But you CANNOT do:
// 
// class foo extends MyAbstractClass, MyOtherAbstractClass {
// 
// }
// 
// because the `foo` class can only extend one abstract class.
// 
// Because you can't inherit/extend from more than one Abstract class.
// 
// An interface is not something that you need to worry about functionality. It
// is more a requirements model.

interface IPerson {
    function getName();
    function setName($name);
}

// Type hinting (where it says IPerson $person) is a way to specify the type
// that the argument has to be. By passing in an interface instead of a
// concrete class, any object that comes from a class that implements that
// interface will pass the type hint:

class Person implements IPerson {
    
    function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
}

class Client {
    function __construct() {
        $person = new Person();
        $this->printName($person);
    }

    function printName(IPerson $person) { // instead of saying Person $person, we
                                          // use IPerson so that we broaden the
                                          // hint here to include all classes
                                          // that implement IPerson, rather than
                                          // just the single class Person
        echo $person->getName();
    }
}

// you can't have variables in interfaces, but you can have constants

interface IDB {
    const HOST = 'example.com';
    const USER = 'root';
    const PASSWORD = 'root';
    const DB = 'allthedata';

    function connString();
}

class sqlDB implements IDB {
    private $host = IDB::HOST;

    function connString() {
        echo $this->host;
    }
}

$dbConnect = new sqlDB();
echo $dbConnect->connString();

// Migrate module is a good place to see examples of interface
// Also look at Drupal's `includes/entity.inc` where 
// `DrupalEntityControllerInterface` is defined.
// 
// Drupal's default controller `DrupalDefaultEntityController` can be extended
// to create custom entities

// EXERCISES
// 
// Create an interface to give a Person object from lesson 3 an email address and website.
// Modify the concrete class from lesson 3 to implement your new interface.
// Instantiate an object from the concrete class.
// Set the email and website of the object, and then echo it back out.


interface TechPerson {
    function setEmail($email);
    function setWebsite($website);
}

interface Customer {
    const TYPE = "customer";
}

class CustomerPerson implements TechPerson {

    // private $type = Customer::TYPE;

    // public function getType() {
    //     return $this->type;
    // }

    function __construct($name) {
        $this->name = strtoupper($name);
        $hello = 'hey';
    }

    public function setName($name) {
        $this->name = strtoupper($name);
    }

    public function getName() {
        return $this->name;
    }

    function talk() {
        return "I like to say my name, ${name}, in the third person";
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function getEmail() {
        return $this->email;
    }

    function getWebsite() {
        return $this->website;
    }
    
}


$newperson = new CustomerPerson('Jess');
$newperson->setEmail("hey@you.com");
$newperson->setWebsite("jessicachanstudios.com");
echo $newperson->getEmail();
echo $newperson->getWebsite();
// echo $newperson->getType();

?>
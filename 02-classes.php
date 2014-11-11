<?php

// An object is an instance of a class. You should try to narrow the way you
// see a problem with objects.

// Use the `class` keyword to create a class
// class Person {
//     // With nothing there, this is the same as the stdClass
// }

// $person = new Person();

// var_dump prints public, private, and protected properties & methods
// 
// private properties and methods can only be accessed from within the class.
// public properties and methods are the default if you don't declare it. They
// can be accessed by the outside world (when you instantiate the object you
// can call these directly.)

class Person {
    private $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$person = new Person();
// $person->name = 'error'; // This will error because it is a private prop
$person->setName('Alice');
// echo $person->getName(); // Alice

// Rewriting ex1 with classes

class MyPerson {

    private $name;

    public $someString = "Hey I'm just a string.";

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function talk() {
        echo 'hi!';
    }
}

$person = new MyPerson;
$person->setName('Jess'); // You can now call this directly
// echo $person->name; // This will error out because $name is private
echo $person->getName(); // This will work and output 'Jess'
$person->talk(); // You can call this directly too
echo $person->someString;

?>
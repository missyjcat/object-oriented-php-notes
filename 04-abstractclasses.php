<?php

// New keywords: abstract, extends, parent

// Abstract classes cannot be instantiated. It's just a way to organize code
// and child classes can exend an abstract class. It's like a blueprint for
// classes.
// 
// A child class must inherit everything from an abstract class, and then you
// can instantiate objects from that child class

abstract class APerson {
    
    // Just mentioning in the blueprint that the child class shoud have these
    // functions defined. This is why there are no curly braces. If you do
    // not define `getName` or `setName` and it is mentioned here with no
    // curly braces, PHP will throw an error.
    // 
    // Don't define these abstract functions here, just declare them.
    // 
    // Don't define properties or use the __construct
    abstract public function getName();
    abstract public function setName($name);

    // This will be inherited wholesale by all child classes that extend this
    // class. You can define functions here and child classes can inherit them
    // and also overwrite them/call parent function.
    public function sayHi() {
        echo 'hey there.';
    }
}

// EXERCISES
// Create an abstract class out of the Person class from lesson 2.
// Create a concrete class that extends the abstract class.
// Instanciate an object from the concrete class.
// Set the name of the person object, and then echo it back out.

abstract class MyPerson {

    abstract public function setName($name);
    abstract public function getName();

    public function talk() {
        echo 'hi! my name is ' . $this->name;
    }
}

// Creating a new child class using `extends` keyword makes sure that this
// child class is based on the `MyPerson` abstract class. So it will need
// to define `setName($name)` and `getName()` or else PHP will error out. It
// will also inherit the `talk()` method.
class LowercasePerson extends MyPerson {

    function __construct($name) {
        $this->name = strtolower($name);
    }

    public function setName($name) {
        $this->name = strtolower($name);
    }

    public function getName() {
        return $this->name;
    }

}

$person = new LowercasePerson('KRIS');
echo $person->getName();
$person->setName('JESSICA');
echo $person->getName();
echo $person->talk();

// the `parent` keyword with a double colon is how you reference the parent
// class's properties/methods

class UppercasePerson extends MyPerson {

    public $hello = "hey this is part of the object";

    private $secret = "cant access this";

    function __construct($name) {
        $this->name = strtoupper($name);
    }

    public function setName($name) {
        $this->name = strtoupper($name);
    }

    public function getName() {
        return $this->name;
    }

    // Here, we are overwriting the parent class "MyPerson"'s `talk()` function
    // but we are calling it first, then adding our own string to it.
    // You can reference a method inside of a scope with the double-colon ::
    function talk() {
        $name = $this->getName();
        return parent::talk() . " I like to say my name, ${name}, in the third person";
    }
}

$upperPerson = new UppercasePerson('Mike');
echo $upperPerson->talk();
echo $upperPerson->hello;


?>
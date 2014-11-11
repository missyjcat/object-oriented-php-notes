<?php

// `__construct` is a special function that runs when an object is first
// instantiated from a class (double underscore)

class Person {
    private $name;
    
    // Can ensure that some values are fixed
    function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }
}

// We can test to see if an object is an instance of a class

$person = new Person('Jess');
echo $person->getName();

// Should be false
if (is_a($person, 'stdClass')) {
    echo 'TRUE';
} else { echo 'FALSE'; }

// Should be true
if (is_a($person, 'Person')) {
    echo 'TRUE';
} else { echo 'FALSE'; }

// Rewriting exercise 2 with a constructor function

class MyPerson {

    function __construct($name) {
        $this->name = $name;
    }

    public function talk() {
        echo 'hi! My name is ' . $this->name;
    }
}

$person = new MyPerson('Jess');
$person->talk();
echo $person->name; // This works because we haven't set the $name
                    // property to private.
echo $person->hey;
?>
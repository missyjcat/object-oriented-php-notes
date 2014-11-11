<?php

// New keyword: static

// static variables are "cached" or stored, or a state. With the static keyword
// no matter how many times the function runs static variables and functions
// keep the state of when they were last run.
// 
// static functions and variables are NOT part of the object. they belong to
// the CLASS.
// 
// Why do this? There are some things that make more sense to belong to the
// class than belonging to the object. EG: Let's say you want to create a class
// that keeps track of how many nodes are being instantiated. You would keep
// a static `count` variable as part of the class, and it increments by one
// every time a new node is instantiated.
// 
// A bad example of a static variable is a `title` on a node, because each node
// is going to have its own title, so it doesn't make sense to make a static
// `title` variable since it will change per node, therefore doesn't belong on
// the class.

function test() {
    static $a = 0;
    echo $a . "\n";
    $a++;
}

test(); // 0
test(); // 1

// Here's an example with classes
class Dog {
    static $numDogs = 0;

    function __construct() {
        Dog::$numDogs++;
    }

    static $numLegs = 4;

    static function hasClaws() {
        return 'TRUE'; // All dogs have claws
    }

    function bark() {
        return "bow wow\n";
    }
}

echo "Most dogs have " . Dog::$numLegs . " legs. \n";

echo "Can dogs scratch? " . Dog::hasClaws() . "\n";

$maggie = new Dog();
$pansib = new Dog();

echo "We have created " . Dog::$numDogs . " dogs.";
?>
<?php

/**
 * Basic objects in PHP
 */

function set_name($object, $name) {
    $object->name = $name;
}

$person = new stdClass();
set_name($person, 'Alice');
echo 'hey ';
echo $person->name;

function Person($name) {
    $person = new stdClass();
    $person->name = $name;

    // `stdClass` is a plain object. When you try to call $person->talk directly
    // you're calling a property, not a function
    $person->talk = function() { echo 'hi, i am the talk function.'; };
    return $person;
}

$person = Person('Jess');
echo $person->name; // Will output 'Jess'
echo var_dump($person); // Will output properties/methods of object
call_user_func($person->talk); // Can't call $person->talk directly; you have
                               // to use the native helper function
                               // `call_user_func` with plain objects

/**
 * `is_a` tests if the first argument is an instance of the second argument
 */

if (is_a($person, 'stdClass')) {
    echo '$person is a stdClass';
} else {
    echo '$person is not a stdClass';
}

?>


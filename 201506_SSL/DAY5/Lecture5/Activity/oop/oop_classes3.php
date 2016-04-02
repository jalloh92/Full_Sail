<?php
class Person
{
    function say_hello()
    {
        echo "hello. <br />";
    }
}


$person = new Person();
$person2 = new Person();

echo get_class($person) . "<br />";

if(is_a($person, 'Person')){
    echo "yes.<br />";
} else {
    echo "no <br />";
}

$person->say_hello();


?>
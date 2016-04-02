<?php

class Person{
    function say_hello(){
        echo "hello inside " . get_class($this) . ".<br />";
    }
}

$person = new Person();
$person->say_hello();

?>
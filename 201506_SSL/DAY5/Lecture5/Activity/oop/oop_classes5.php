<?php

class Person{
    var $firstname;
    var $lastname;

    var $arm_count = 2;
    var $leg_count = 2;

    function say_hello(){
        echo "Hello from" . get_class($this) . "<br />";
    }
    function hello(){
        $this->say_hello();
    }
    function full_name(){
        return $this->firstname . " " . $this->lastname;
    }
}

$person = new Person();
echo $person->arm_count;
$person->arm_count = 3;
$person->firstname = 'lucy';

$new_person = new Person();
$new_person->firstname = 'ethel';
$new_person->lastname = 'Mertz';

echo $person->firstname . '<br />';
echo $new_person->full_name() . '<br />';

$vars = get_class_vars('Person');
foreach($vars as $var => $value){
    echo "{$var}: {$value}<br />";
}

echo property_exists('Person', 'firstname') ? 'true' : 'false';

?>
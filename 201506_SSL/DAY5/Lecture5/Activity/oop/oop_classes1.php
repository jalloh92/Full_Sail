<?php

class Person {
    function say_hello(){
        echo "hello. <br />";
    }
}

if(class_exists("Person")){
    echo "class has been def. <br />";

}else{
    echo "nope";
}


$methods = get_class_methods('Person');
foreach($methods as $method){
        echo $method . "<br />";
    }

if(method_exists('Person', 'say_hello')){
    echo "Method does exist.<br />";
} else {
    echo "nope<br />";
}
?>

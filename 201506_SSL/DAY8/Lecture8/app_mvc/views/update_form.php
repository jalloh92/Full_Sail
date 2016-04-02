<!--

// filename:  update_form.php
// directed from: $_GET["action"]=="editFruit" (#2 on controllers/Action_Controller.php)
// $data is passed in:  $data = $fruits->getFruit($_GET["fruitid"]);
// method="POST"
// action ="?action=editAction" with fruitId (#3 on controllers/Action_Controller.php)

-->

<div class="form container">
    <h3>Update Fruit</h3>

<?php

    //var_dump($results);
    foreach($results as $fruit){

?>
    

    
    <form action="?action=editAction&fruitid=<?=$fruit["fruitname"];?>" method="POST" >
        
        <input type="text" name ="fruitname" value="<?=$fruit["fruitname"];?>"/>
        <input type="text" name ="fruitcolor" value="<?=$fruit["fruitcolor"];?>"/>
        <input type="hidden" name="fruitid" value="<?=$fruit["fruitid"];?>"/>
    <input type = "submit"/>
    </form>
       
<?

} // closes foreach statement

?>

</div><!-- closes contianer -->
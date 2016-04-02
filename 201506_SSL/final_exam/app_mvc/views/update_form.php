<!--

// filename:  update_form.php
// directed from: $_GET["action"]=="editclient" (#2 on controllers/Action_Controller.php)
// $data is passed in:  $data = $clients->getclient($_GET["clientid"]);
// method="POST"
// action ="?action=editAction" with clientId (#3 on controllers/Action_Controller.php)

-->

<div class="form container">
    <h3>Update Client</h3>

<?php

    //var_dump($results);
    foreach($results as $client){

?>
    

    
    <form action="?action=editAction&id=<?=$client["id"];?>" method="POST" >
        
        <input type="text" name ="name" value="<?=$client["name"];?>"/>
        <input type="text" name ="phone" value="<?=$client["phone"];?>"/>
        <input type="text" name ="email" value="<?=$client["email"];?>"/>
        <input type="text" name ="website" value="<?=$client["website"];?>"/>
        <input type="hidden" name="id" value="<?=$client["id"];?>"/>
    <input type = "submit"/>
    </form>
       
<?

} // closes foreach statement

?>

</div><!-- closes contianer -->
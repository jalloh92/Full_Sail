<?
// Create "clients" Class (aka object)

class clients{

	// *********** GET (ALL) clientS *********************
    // nothing is passed in
    // $result is an array from the database of all clients
    public function getClients(){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // grab all the clients from the database
        $st = $dbh->prepare("select id, name, phone, email, website from clients ORDER BY name ASC");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (SINGLE) client *********************
    // called when ($_GET["action"]=="editClient")
    // pass in id
    // $result is an array from the database with id matching the one passed into it
    public function getClient($fid){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // grab all users which matching userid's (should be one!)
        // return result
        $st = $dbh->prepare("select id, name, phone, email, website from clients where id = :id");
        $st->execute(array(":id"=>$fid));
        $result = $st->fetchAll();
        // var_dump($result);
        return $result;
    }

    // *********** EDIT client *********************
    // called when ($_GET["action"]=="editClient")
    // pass in id, name, phone, email, website
    // nothing is returned; database is updated with current info
    public function updateClient($fid, $fname, $fphone, $femail, $furl){
        // log into the database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("update clients set name = :fn, phone = :fp, email = :fe, website = :fw where id = :id");
        $st->execute(array(":fn"=>$fname, ":fp"=>$fphone, ":fe"=>$femail, ":fw"=>$furl, ":id"=>$fid));
    }

    // *********** DELETE client *********************
    // called when ($_GET["action"]=="deleteClient")
    // pass in clientid
    // nothing is returned; database is updated with deletion of client
    public function deleteClient($fid){
        // log into the database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // delete user from database
        $st = $dbh->prepare("delete from clients where id= :id");
        $st->execute(array(":id"=>$fid));
    }

    // *********** ADD client *********************
    // called when ($_GET["action"]=="addClientAction") -- (#5)
    // pass in name, phone, email, website
    // nothing is returned; database is updated with new client
    public function addClient($fname,$fphone,$femail,$furl){
        $error = "";
        
        // check if fields are empty
        if(empty($fname) || empty($fphone) || empty($femail) || empty($furl)){
            $error = "Some fields are empty; please try again";
            return $error;
        }

        // validate email & url
        else if (!filter_var($femail, FILTER_VALIDATE_EMAIL)) {
            $error = "That email address is not valid; please try again";
            return $error;
        }

        else if (!filter_var($furl, FILTER_VALIDATE_URL)) {
            $error = "That website is not valid; please try again";
            return $error;
        }
        
        // if all fields are filled out & email & website are valid, then add user to database
        else{

            // log into database
            $user = "root";
            $pass = "root";
            $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

            // insert the values into the database
            $st = $dbh->prepare("insert into clients (name,phone,email,website) values (:fn, :fp,:fe, :fw)");
            $st->execute(array(":fn"=>$fname,":fp"=>$fphone,":fe"=>$femail, ":fw"=>$furl));
            return $error;
        } // closes validation if / else statements   
    }
    

} // closes class clients


?>
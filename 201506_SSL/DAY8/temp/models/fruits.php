<?
// Create "Fruits" Class (aka object)

class Fruits{

	// *********** GET (ALL) FRUITS *********************
    // called when ($_GET["action"]=="fruitList") -- (#5)
    // nothing is passed in
    // $result is an array from the database of all fruits
    public function getFruits(){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // grab all the fruits from the database
        $st = $dbh->prepare("select fruitid, fruitname from fruits");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }

    // *********** GET (SINGLE) FRUIT *********************
    // called when ($_GET["action"]=="editFruit") -- (#6)
    // pass in fruitid
    // $result is an array from the database with fruitid matching the one passed into it
    public function getFruit($fid){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // grab all users which matching userid's (should be one!)
        // return result
        $st = $dbh->prepare("select fruitid, fruitname from fruits where fruitid = :id");
        $st->execute(array(":id"=>$fid));
        $result = $st->fetchAll();
        return $result;
    }

    // *********** UPDATE FRUIT *********************
    // called when ($_GET["action"]=="editFruit") -- (#7)
    // pass in fruitname and fruitid
    // nothing is returned; database is updated with current info
    public function updateUser($fname,$fid){
        // log into the database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // update the values in the database
        $st = $dbh->prepare("update fruits set fruitname = :fn where fruitid= :id");
        $st->execute(array(":fn"=>$fname,":id"=>$fid));
    }

    // *********** DELETE FRUIT *********************
    // called when ($_GET["action"]=="deleteFruit") -- (#8)
    // pass in fruitid
    // nothing is returned; database is updated with deletion of fruit
    public function deleteFruit($fid){
        // log into the database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssldb;port=8889', $user, $pass);

        // delete user from database
        $st = $dbh->prepare("delete from fruits where fruitid= :id");
        $st->execute(array(":id"=>$fid));
    }

    // *********** ADD FRUIT *********************
    // called when ($_GET["action"]=="addFruitAction") -- (#10)
    // pass in fruitname, fruitcolor, fruitimage
    // nothing is returned; database is updated with new fruit
    public function addFruit($fname,$fcolor,$fimage){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssldb;port=8889', $user, $pass);

        // insert the values into the database
        $st = $dbh->prepare("insert into fruits (fruitname,fruitcolor,fruitimage) values (:fn, :fc,:fi)");
        $st->execute(array(":fn"=>$fname,":fc"=>$fcolor,":fi"=>$fimage));
    }

} // closes class users

	
}

?>
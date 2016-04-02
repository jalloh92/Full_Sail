<?
// Create "grades" Class (aka object)

class grades{

	// *********** GET (ALL) gradeS *********************
    // nothing is passed in
    // $result is an array from the database of all grades
    public function getgrades(){
        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // grab all the grades from the database
        $st = $dbh->prepare("select studentid, studentname, studentpercent, studentlettergrade from grades");
        $st->execute();
        $result = $st->fetchAll();
        return $result;
    }


    // *********** DELETE grade *********************
    // called when ($_GET["action"]=="deletegrade") -- (#4)
    // pass in gradeid
    // nothing is returned; database is updated with deletion of grade
    public function deletegrade($sid){
        // log into the database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // delete user from database
        $st = $dbh->prepare("delete from grades where studentid= :id");
        $st->execute(array(":id"=>$sid));
    }

    // *********** ADD grade *********************
    // called when ($_GET["action"]=="addGradeAction") -- (#5)
    // pass in studentname, studentpercent, studentlettergrade
    // nothing is returned; database is updated with new grade
    public function addgrade($sname,$spercent){
        
        if ($spercent >= 90){
            $slettergrade = 'A';
        } else if ($spercent >= 80){
            $slettergrade = 'B';
        } else if ($spercent >= 70){
            $slettergrade = 'C';
        } else if ($spercent >= 60){
            $slettergrade = 'D';
        } else {
            $slettergrade = 'F';
        }

        // log into database
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        // insert the values into the database
        $st = $dbh->prepare("insert into grades (studentname, studentpercent, studentlettergrade) values (:sn, :sp,:sl)");
        $st->execute(array(":sn"=>$sname,":sp"=>$spercent,":sl"=>$slettergrade));
    }

   

} // closes class grades


?>
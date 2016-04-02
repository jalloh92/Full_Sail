<?

// Setup DB Username & Password
$user = 'root';
$pass = 'root';
$salt = "SuperFIASaltHash";

// Establish PDO & DSN Connection to Database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=logout'>Log Out?</a>&nbsp;|&nbsp;";
echo "<a href='http://localhost:8888/DAY6/mvc_app/index.php/?action=dashboard'>Dashboard</a>&nbsp;";

?>


<table width="80%" align="center">
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Profile Photo</th>
        <th>Action</th>
    </tr>

    <!-- QUERY & PRINT ALL FRUIT RECORDS/DETAILS FROM SSL DATABASE; PLUS PROVIDE OPTIONAL DELETE LINK -->
    <?

    $stmt = $dbh->prepare('SELECT * FROM users order by userid ASC;');

    $stmt->execute();

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['password'] .  '</td><td>' . $row['profilePhoto'] . ' </td><td><a href="http://localhost:8888/DAY6/mvc_app/index.php?action=deleteusers&id=' . $row['userid'] . '">Delete</a></td><td><a href="http://localhost:8888/DAY6/mvc_app/index.php?action=updateusers&id=' . $row['userid'] . '">Update</a></td>';

    }

    ?>


    <form id="editProfile" enctype="multipart/form-data" action="?action=update" method="POST">
        <div class="form-group text-left">
            <input value="<? echo $result[0]["username"] ?>" id="current_username_li" name="current_username_li" type="hidden" />
            <input value="<? echo $result[0]["userid"] ?>" id="current_userid_li" name="current_userid_li" type="hidden" />
        </div>
        </div>
    </form>
    </tr></table>

<?
//echo "<a href='/MVCBasics/PHPBasics_MVCChallengeFIXEDv0/index.php?action=editprofile&id=" . $result[0]["userid"] . "'>Edit Profile</a>&nbsp;<br><br>";
?>


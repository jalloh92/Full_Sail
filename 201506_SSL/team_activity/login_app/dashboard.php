<?php
ini_set('session.gc_maxlifetime', 86400); //a user should be able to browse your application
// for 24 hours before needing to re-authenticate their session.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/styles.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class = 'container'>
        <h2>My Dashboard:</h2>
        

<?php
    // Setup DB Username & Password
    $user = 'root';
    $pass = 'root';
    $salt = "kellyssalthash";

    // Establish PDO & DSN Connection to Database
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

    // Provide links to logout & dashboard pages
    echo "<a href='logout.php'>Log Out</a>&nbsp;|&nbsp;";
    echo "<a href='dashboard.php'>Dashboard</a><br><br>";
    ?>

    <table class="table">
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Profile Photo</th>
        <th>Action</th>
    </tr>

    <?

    // Get information from the database
    $stmt = $dbh->prepare('SELECT * FROM users order by userid ASC;');
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    // Display information in rows
    foreach ($result as $row) {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['profilePhoto'] . ' </td><td><a href="deleteuser.php?id=' . $row['userid'] . '">Delete</a></td><td><a href="updateuser.php?id=' . $row['userid'] . '">Update</a></td></tr>';
    }

    ?>

    </table>

</body>
</html>
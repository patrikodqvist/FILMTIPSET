<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>FILMTIPSET</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>

	</head>
	<body>
	<div class="header">
	<h1 id="firstheader">FILMTIPSET</h1></div>

<?php
        // Börjar med connect_db-funktionen som vi fick i en annan fil, för att kunna 
// ansluta till databasen. 
    
function connect_db() {

    // vanliga värden hos er är        root          ""       måste definieras
    // 127.0.0.1 är localhost, användarnamn, lösenord, databasens namn
    $mysqli = new mysqli('localhost', 'dui', 'dui-xmlpub16', 'dui');

    if (!$mysqli->set_charset("utf8")) {
        echo "Error loading character set utf8: %s\n". $mysqli->error;
    } else {
        //echo "Current character set: %s\n". $mysqli->character_set_name();
    }
    
    if ($mysqli->connect_errno) { //Om det inte går att connecta: berätta för användaren
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    return $mysqli;
}

?>


	<div class="container">
	<form action="Register_page.php" method="post">
	    <table cellpadding="20" cellspacing="5">
	    <td><h3>First name</h3></td>
	        <td><input type="text" name="first_name" required maxlength="50" autocomplete="off"/></td>
        <td><h3>Last name</h3></td>
            <td><input type="text" name="last_name" required maxlength="50" autocomplete="off"/></td></tr>
        <td><h3>Email</h3></td>
            <td><input type="text" name="email" required maxlength="50" autocomplete="off"/></td></tr>
        <td><h3>Username</h3></td>
            <td><input type="text" name="username" required maxlength="50" autocomplete="off"/></td>
	    <td><h3>Password</h3></td>
	        <td><input type="text" name="password" required maxlength="50" autocomplete="off"/></td></tr>

	        <tr><td><input type="submit" name="register" value="Register" /></td></tr>
        </table>
    </form>
</div>

<?php

        if (isset($_POST['register'])) {
          
        // Hämtar in värdet från formuläret. 
            
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO User
                VALUES('$username', '$password', '$first_name', '$last_name', '$email')";

        // Här sker själva queryn. Genom att vi kallar på funktionen connect_db. 
        if ($mysqli = connect_db()) {
        $mysqli->query($sql);
        print_r($mysqli->error);
        }
            
        // Skriver ut att det har lyckats. 
        $mysqli->query($sql);
        echo "You have been registered";
            
        //Om det misslyckas
        if ($mysqli->connect_error) {
            echo "Connection failed: (".$mysqli->connect_errno.")".$mysqli->connect_error;
        }
            
        
    }?>

	</body>
</html>
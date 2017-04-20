<?php

	if(isset($_POST['submit'])){
		$_SESSION['username'] = $_POST['username'];

	    $username = $_POST['username'];
	    $password = $_POST['password'];

	    $username = htmlspecialchars($username);
		$password = htmlspecialchars($password);

	    $sql = "SELECT *
	    		FROM User
	    		WHERE id='$username'
	    		AND password='$password'";

        if ($mysqli = connect_db()) {
	        $mysqli->query($sql);
	        print_r($mysqli->error);
        }

        $mysqli->query($sql);
            
        //Om det misslyckas
        if ($mysqli->connect_error) {
            echo "Connection failed: (".$mysqli->connect_errno.")".$mysqli->connect_error;
        }
        
        $result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			session_start();
			$_SESSION['User'] = "$username";
			header("Location: profile.php");
		}
		else {
			header("Location: login_error.php");
			exit;
		}
	}
?>

<?php
    
function connect_db() {

    $mysqli = new mysqli('localhost', 'dui', 'dui-xmlpub16', 'dui');

    if (!$mysqli->set_charset("utf8")) {
        echo "Error loading character set utf8: %s\n". $mysqli->error;
    } else {
    }
    
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    return $mysqli;
}

?>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>FILMTIPSET</title>
		<link rel='stylesheet' type='text/css' media='screen and (max-width:400px)' href="stylesheet_narrow.css"/>
		<link rel='stylesheet' type='text/css' media='screen and (min-width:401px)' href="stylesheet_pat.css"/>
	</head>
	<body>

		<div class="background-image"></div>
		<!--Header-->
    	<div class="header">
			<div class="meny" onclick="myFunction(this)">
			  <div class="bar1"></div>
			  <div class="bar2"></div>
			  <div class="bar3"></div>
			</div>

			<script>
				function myFunction(x) {
				x.classList.toggle("change");
				}
			</script>

			<div class="maintitle">
				<h1 class="firstheader">
					<a class="link" href="http://xml.csc.kth.se/~podqvist/DM2517/projekt/filmtipset-patte/login_page.php">FILMTIPSET</a>
				</h1>
			</div>
			<div class="account">
			
		</div>
		</div>

		<div class="background">
			<h1 class="toptitle">WELCOME</h1>
			<form action="firstpage.php" method="post">
			    <table cellpadding="20" cellspacing="1">
			        <tr><td><input class="writefield" type="text" name="username" placeholder="Username" /></td></tr>

			        <tr><td><input class="writefield" type="password" name="password" placeholder="Password"/></td></tr>

			        <tr><td><input class="submitbuttom" type="submit" name="submit" value="Submit" /></td></tr>
	    	</form>

			<form action="register_page.php" method="post">
		        <tr><td><input class="submitbuttom" type="submit" name="register" value="Register" /></td></tr>
			</form>
			</table>
		</div>

		

<?php print $errorMessage;?>
	</body>
</html>
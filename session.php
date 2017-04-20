<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');
// Selecting Database
$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("SELECT username FROM User where username='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: login_page.php'); // Redirecting To Home Page
}
?>

<?php
	
	session_start();
		$user_check = $_SESSION['username'];

	    $sql = "SELECT *
	    		FROM User
	    		WHERE id='$user_check'";

        $row = mysql_fetch_assoc($sql);

        $login_session = $row['username'];

        if (!isset($login_session)){
			header('Location: login_page.php'); // Redirecting To Home Page
        	exit;
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
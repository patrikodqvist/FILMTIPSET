<?php
	include('Firstpage.php');
?>

<html>
	<body>
		<div class="profile">
			<b id="logged_in">Logged in as: <?php echo $_SESSION['User']; ?></b>
			<br/>
			<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
	</body>
</html>
<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>New website</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>

	</head>
	<body>
	<h1><a class="link" href="http://xml.csc.kth.se/~dui/DM2517/Projekt/Firstpage.php">FILMTIPSET</a></h1>

<?php
       
	$mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$query = "SELECT * FROM Movie ORDER BY imdb_rating DESC";

	if (($result = mysqli_query($mysqli, $query)) === false) {
		printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
		exit();
	}

	$returnstring = '';

	while ($line = $result->fetch_object()) {

		$movie_id = $line->movie_id;
        $title = $line->title;
        $description = $line->description;
        $run_time = $line->run_time;
        $release_date = $line->release_date;
        $director_id = $line->director_id;
        $genre_id = $line->genre_id;
        $nationality = $line->nationality;
        $imdb_rating = $line->imdb_rating;
        $cast = $line->cast;
        $pic = $line->pic;
        $link = $line->link;

        $returnstring .= "<div>";
        $returnstring .= "<p><a class='link' href='$link'><h3>$title</h3></a><a class='bild' href='$link'><img src='$pic'></img></a></p>";
        $returnstring .= "<p id='dscr'>$description</p>";
        $returnstring .= "<p>Rating: $imdb_rating</p>";
        $returnstring .= "</div>";
	}

	mysqli_free_result($result);
	print utf8_encode($returnstring);


?>
	</body>
</html>
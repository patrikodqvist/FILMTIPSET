<?php header("Content-type: text/xml; charset=utf-8");?>
<?php echo '<?xml-stylesheet type="text/xsl" href="xsltTEST.xsl"?>';?>

<filmtipset>
<Actors>
<?php
        $mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

        if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }

        $query = "SELECT * FROM Actor";

        if (($result = mysqli_query($mysqli, $query)) === false) {
                printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
                exit();
        }

        $returnstring = '';

        while ($line = $result->fetch_object()) {

        $actor_id = $line->actor_id;
        $first_name = $line->first_name;
        $last_name = $line->last_name;
        $nationaliyu = $line->nationality;
        $gender = $line->gender;

        $returnstring .= "<Actor>\n";
        $returnstring .= "<Actor_ID>$actor_id</Actor_ID>\n";
        $returnstring .= "<First_name>$first_name</First_name>\n";
        $returnstring .= "<Last_name>$last_name</Last_name>\n";
        $returnstring .= "<Nationality>$nationality</Nationality>\n";
        $returnstring .= "<Gender>$gender</Gender>\n";
        $returnstring .= "</Actor>\n";
        
        }

        mysqli_free_result($result);
        print utf8_encode($returnstring);
?>
</Actors>

<Directors>
<?php
        $mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

        if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }

        $query = "SELECT * FROM Director";

        if (($result = mysqli_query($mysqli, $query)) === false) {
                printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
                exit();
        }

        $returnstring = '';

        while ($line = $result->fetch_object()) {

        $first_name = $line->first_name;
        $last_name = $line->last_name;
        $nationality = $line->nationality;
        $director_id = $line->director_id;

        $returnstring .= "<Director id='$director_id'>\n";
        $returnstring .= "<First_name>$first_name</First_name>\n";
        $returnstring .= "<Last_name>$last_name</Last_name>\n";
        $returnstring .= "<Nationality>$nationality</Nationality>\n";
        $returnstring .= "</Director>\n";
        
       
        }

        mysqli_free_result($result);
        print utf8_encode($returnstring);
?>
</Directors>

<Genres>
<?php
    $mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

    if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
    }

    $query = "SELECT * FROM Genre";

    if (($result = mysqli_query($mysqli, $query)) === false) {
            printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
            exit();
    }

    $returnstring = '';

    while ($line = $result->fetch_object()) {

    $name = $line->name;

    $returnstring .= "<Genre id='$name'></Genre>\n";
    }

    mysqli_free_result($result);
    print utf8_encode($returnstring);
?>
</Genres>

<Movies>
<?php

	if (isset($_POST['spara'])) {
	  
	// Hämtar in värdet från formuläret. 
	    
	$genre = $_POST['genre_id'];
	$year1 = $_POST['release_date1'];
	$year2 = $_POST['release_date2'];

	// Create connection
	$conn = new mysqli('localhost', 'dui', 'dui-xmlpub16', 'dui');
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT *
	        FROM Movie
	        WHERE release_date >= '$year1'
	        AND release_date <= '$year2'
	        AND genre_id='$genre'
	        ORDER BY imdb_rating DESC";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
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

	        $returnstring .= "<Movie id='$movie_id'>\n";
	        $returnstring .= "<Title>$title</Title>\n";
	        $returnstring .= "<Description>$description</Description>\n";
	        $returnstring .= "<Run_time>$run_time</Run_time>\n";
	        $returnstring .= "<Release_date>$release_date</Release_date>\n";
	        $returnstring .= "<Director_id>$director_id</Director_id>\n";
	        $returnstring .= "<Genre>$genre_id</Genre>\n";
	        $returnstring .= "<Nationality>$nationality</Nationality>\n";
	        $returnstring .= "<IMDB_rating>$imdb_rating</IMDB_rating>\n";
	        $returnstring .= "<Studio>$studio</Studio>\n";
	        $returnstring .= "<Link>$link</Link>\n";
	        $returnstring .= "<Pic>$pic</Pic>\n";
	        $returnstring .= "</Movie>\n";

	        $returnstring = str_replace('&', '&amp;', $returnstring);


	        }
	        print utf8_encode($returnstring);

	} else {

	echo "0 RESULTS";
	}
	$conn->close();

	}
?>

<?php
    if (isset($_POST['all'])) {

    // Create connection
    $conn = new mysqli('localhost', 'dui', 'dui-xmlpub16', 'dui');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT *
            FROM Movie
            ORDER BY imdb_rating DESC";

    $result = $conn->query($sql);

        // output data of each row
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

            $returnstring .= "<Movie id='$movie_id'>\n";
            $returnstring .= "<Title>$title</Title>\n";
            $returnstring .= "<Description>$description</Description>\n";
            $returnstring .= "<Run_time>$run_time</Run_time>\n";
            $returnstring .= "<Release_date>$release_date</Release_date>\n";
            $returnstring .= "<Director_id>$director_id</Director_id>\n";
            $returnstring .= "<Genre>$genre_id</Genre>\n";
            $returnstring .= "<Nationality>$nationality</Nationality>\n";
            $returnstring .= "<IMDB_rating>$imdb_rating</IMDB_rating>\n";
            $returnstring .= "<Studio>$studio</Studio>\n";
            $returnstring .= "<Link>$link</Link>\n";
            $returnstring .= "<Pic>$pic</Pic>\n";
            $returnstring .= "</Movie>\n";

            $returnstring = str_replace('&', '&amp;', $returnstring);


            }
            print utf8_encode($returnstring);

    $conn->close();

    }
?>

</Movies>

<Studios>
<?php
        $mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

        if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }

        $query = "SELECT * FROM Studio";

        if (($result = mysqli_query($mysqli, $query)) === false) {
                printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
                exit();
        }

        $returnstring = '';

        while ($line = $result->fetch_object()) {

        $studio_id = $line->studio_id;
        $name = $line->name;
        $location = $line->location;

        $returnstring .= "<Studio id='$studio_id'>\n";
        $returnstring .= "<Name>$name</Name>\n";
        $returnstring .= "<Location>$location</Location>\n";
        $returnstring .= "</Studio>";
        }

        mysqli_free_result($result);
        print utf8_encode($returnstring);
?>
</Studios>

<ActorFilms>
<?php
        $mysqli = mysqli_connect('localhost', 'dui', 'dui-xmlpub16', 'dui');

        if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }

        $query = "SELECT * FROM Actor_film";

        if (($result = mysqli_query($mysqli, $query)) === false) {
                printf("Query failed %s<br/>\n&s", $query, mysqli_error($mysqli));
                exit();
        }

        $returnstring = '';

        while ($line = $result->fetch_object()) {

        $actor_film_ID = $line->actor_film_ID;
        $movie_id = $line->movie_id;
        $actor_id = $line->actor_id;

        $returnstring .= "<Actor_Film id='$actor_film_ID'>\n";
        $returnstring .= "<Actor_ID>$actor_id</Actor_ID>\n";
        $returnstring .= "<Movie_ID>$movie_id</Movie_ID>\n";
        $returnstring .= "</Actor_Film>";
        }

        mysqli_free_result($result);
        print utf8_encode($returnstring);
?>
</ActorFilms>


</filmtipset>
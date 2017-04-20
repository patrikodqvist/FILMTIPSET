
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
				</div>

				<script>
					function myFunction(x) {
					x.classList.toggle("change");
					}
				</script>

				<div class="maintitle">
					<h1 class="firstheader">
						<a class="link" href="http://xml.csc.kth.se/~podqvist/DM2517/Projekt/Projekt3/login_page.php">FILMTIPSET</a>
					</h1>
				</div>
				<div class="account">
			<h1><a class="link" href="http://xml.csc.kth.se/~podqvist/DM2517/Projekt/Projekt3/Firstpage.php">ACCOUNT</a></h1>
		</div>
			</div>

			<!--Inforuta-->
			<div class="background">
			<h1 class="genre">Genre</h3>
		    <table class="tabletop" cellpadding="5" cellspacing="2">
			    <form action="Efter_frontpage.php" method="post">
			    <tr>
			        <td>
				        <h1 class="checkbox">Drama</h1>
				        <input type="radio" name="genre_id" value="Drama" required/>
			        </td>
			        <td>
			        	<h1 class="checkbox">Action</h1>
			        	<input type="radio" name="genre_id" value="Action"/>
			        </td>
			        <td>
				        <h1 class="checkbox">Comedy</h1>
				        <input type="radio" name="genre_id" value="Comedy"/>
			        </td>
			        <td>
			        	<h1 class="checkbox">Sci-fi</h1>
			        	<input type="radio" name="genre_id" value="Sci-fi"/>
			        </td>
			    </tr>
			</table>
			<table class="tabletop" cellpadding="5" cellspacing="2">
			    <tr>
			    	<td>
			    		<h1 class="genre">Between year</h1>
			    	</td>
			    </tr>
			    <tr>
			       <td>
			       		<input class="numberfield" type="text" name="release_date1" required/>
			       </td>
			     </tr>
			    <tr>
			    	<td>
			    		<h1 class="genre">And...</h1>
			    	</td>
			    </tr>
			    <tr>
		        	<td>
		        		<input class="numberfield" type="text" name="release_date2" required/>
		        	</td>
		        </tr>
		        <tr>
		        	<td>
		        		<input class="submitbuttom" type="submit" name="spara" value="Submit" />
		        	</td>
		        </tr>
				</form>
				<form action="Efter_frontpage.php" method="post">
		        <tr>
		        	<td colspan="4">	
		        		<input class="submitbuttom" type="submit" name="all" value="See all top rated movies" />
		        	</td>
		        </tr>
				</form>
			</table>
		</div>

		
	</body>
</html>
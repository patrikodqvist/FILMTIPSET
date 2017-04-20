<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
<xsl:output method="html" indent="yes"/>

<xsl:template match="/">
 	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="filmtipset">

<html>
    <head>
    	<title>FILMTIPSET</title>
    </head>

    <META http-equiv="Content-Type" content="text/html; charset=UTF-8"></META>
	<link rel='stylesheet' type='text/css' media='screen and (max-width:400px)' href="stylesheet_narrow.css"/>
		<link rel='stylesheet' type='text/css' media='screen and (min-width:401px)' href="stylesheet_pat.css"/>

    <body>
		<div class="background-image"></div>

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
				<a class="link" href="http://xml.csc.kth.se/~podqvist/DM2517/Projekt/Projekt3/login_page.php">FILMTIPSET</a>
			</h1>
		</div>
		<div class="account">
			<h1><a class="link" href="http://xml.csc.kth.se/~podqvist/DM2517/Projekt/Projekt3/Firstpage.php">ACCOUNT</a></h1>
		</div>
	</div>

	<div class="background_movies">
		<xsl:for-each select="Movies/Movie">
				<xsl:variable name="link" select="Link"/>
					<div class="movie">
						<div class="accordion">
							<xsl:variable name="picture" select="Pic"/>
							<img height="270px" width="180px" src="{$picture}"></img>

							<h4 class="title"><xsl:apply-templates select="Title"/></h4>
							<h4 class="title"><img src="star.png" height="12px" width="12px"/><xsl:text> </xsl:text>
								<xsl:apply-templates select="IMDB_rating"/></h4>
						</div>

							<div class="panel">
								<h4 style="text-decoration: underline;">Description: </h4>
								<p><xsl:apply-templates select="Description"/></p>
								<a href="{$link}"><h4 style="text-decoration: underline;">Link to IMDB</h4></a>
								<xsl:variable name="movieid" select="@id"/>
								<!--<xsl:apply-templates select="../../ActorFilms/Actor_Film[Movie_ID=$movieid]/Actor_ID"/>-->
								<h4 style="text-decoration: underline;">Actors: </h4>
								<xsl:for-each select="../../ActorFilms/Actor_Film[Movie_ID=$movieid]">
									<xsl:variable name="actor" select="Actor_ID"/>
									<!--<xsl:apply-templates select="$actor"/>-->

									<xsl:apply-templates select="../../Actors/Actor[Actor_ID=$actor]/First_name"/>
									<xsl:text> </xsl:text>
									<xsl:apply-templates select="../../Actors/Actor[Actor_ID=$actor]/Last_name"/>
									<br/>
								</xsl:for-each>
							</div>
					</div>
		</xsl:for-each>
		<div style="clear:both"></div>
	</div>

					
		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i &lt; acc.length; i++) {
			  acc[i].onclick = function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
				  if (panel.style.maxHeight){
			  	  panel.style.maxHeight = null;
			    } else {
			  	  panel.style.maxHeight = panel.scrollHeight + 'px';
			    } 
			  }
			}
		</script>
	<div class="footer">
		<div class="about_us">
				<li><h1><xsl:text>About us</xsl:text></h1></li>
		</div>
		<div class="space"/>
		<div class="copyright">
			<h1><xsl:text>Copyright DUNKPAT</xsl:text></h1>
		</div>
	</div>


    </body>
</html>
</xsl:template>
</xsl:stylesheet>
<html>
	<head>
		<title>HKU Timetable</title>
		<link href="styles/mobile.css?v=1.3" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/rooster.js?v=1.4"></script>

	    <meta charset="UTF-8">
		<meta name="description" content="Een alternatief voor het HKU Rooster gemaakt door Bobbie Goede.">
		<meta name="keywords" content="Rooster, HKU, Hogeschool, Kunsten, Utrecht, Overzichtelijk, Simpel">
		<meta name="author" content="Bobbie Goede">

		<meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="apple-mobile-web-app-title" content="HKU Timetable">
	    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	    <!-- <meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0" /> -->
	    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="theme-color" content="#1C1D1E">

	    <link href="files/favicon_152x152" sizes="152x152" rel="apple-touch-icon">
	    <link href="files/favicon_144x144" sizes="144x144" rel="apple-touch-icon">
	    <link href="files/favicon_76x76" sizes="76x76" rel="apple-touch-icon">
	    <link href="files/favicon_72x72" sizes="72x72" rel="apple-touch-icon">
	    <link href="files/favicon_120x120" sizes="120x120" rel="apple-touch-icon">
	    <link href="files/favicon_114x114" sizes="114x114" rel="apple-touch-icon">
	    <link href="files/favicon_57x57" sizes="57x57" rel="apple-touch-icon">
		<link rel="apple-touch-startup-image" href="files/startup.png">

		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" sizes="300x300" href="favicon.png">
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-41320767-5', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	<body>

		<nav style="z-index: 1000"><div id="hamburger" style="display: inline-block; float:left;"></div>
		<a id="current_class" href="#" style="margin: 0 auto;"></a>
		</nav>
		<div id="list" class="menuoff">
				<div id="student_button" class="list_button">STUDENT</div><div id="docent_button" class="list_button" style="background-color: #CCC;">TEACHER</div>
				<div id="links" class="menuon"></div>
				<div id="links-docent" class="menuoff"></div>
		</div>
		<div id="mobile">
			<div id="curday">
				<div class="load_container">
					<div class='load_wrapper'><div class='loading'></div></div>
					<div class='deadlines'>Deadlines coming soon</div>
				</div>
			</div>
		</div>
		<div class="content"></div>

		<?php
		if($_GET['url'] == 'resetcookie'){
				setcookie("hku_class", null, time()+2592000);
		}

			echo "<div class='school' style='height: 0px; overflow: hidden;'>";
			echo file_get_contents('http://lesroostersgames.hku.nl/student/');
			echo "</div>";

			echo "<div class='school-docent' style='height: 0px; overflow: hidden;'>";
			echo file_get_contents('http://lesroostersgames.hku.nl/docent/');
			echo "</div>";
		?>

	</body>
	<script>
		var linknames = [];
		var linkdestinations = [];
		var links = $('.school a');
		var listlinks = '';
		var classes = ["G&I1A", "G&I1B", "G&I1C", "G&I1D", "GAR2-A", "GAR2-B", "GAR2-C", "GAR2-D", "GDD2-A", "GDD2-B", "IAD2-A", "IAD2-B", "UU-Minor1", "UU-Minor2", "Jaar 3 G&I", "Jaar 4 G&I"];

		for(var i=0; i<links.length; i++) {
			    linkdestinations.push(links[i].href.substr(links[i].href.lastIndexOf('/') + 1));
			    linknames.push(links[i].textContent);
			    if(classes.indexOf(linknames[i]) != -1){

				    listlinks += "<a href='#' onclick=\"loadContent('"+linkdestinations[i]+"','"+linknames[i]+"')\">"+linknames[i]+"</a>";
				}
		}
		$('#links').html(''+listlinks+'');

		var linknames_d = [];
		var linkdestinations_d = [];
		var links_d = $('.school-docent a');
		var listlinks_d = '';
		var overzicht = "Overzichtspagina";
		
		for(var i=0; i<links_d.length; i++) {
			    linkdestinations_d.push(links_d[i].href.substr(links_d[i].href.lastIndexOf('/') + 1));
			    linknames_d.push(links_d[i].textContent);
			    if(overzicht.indexOf(linknames_d[i]) != 1){
				    listlinks_d += "<a href='#' onclick=\"loadContent_d('"+linkdestinations_d[i]+"','"+linknames_d[i]+"')\">"+linknames_d[i]+"</a>";
				}
		}
		$('#links-docent').html(''+listlinks_d+'');

	</script>
</html>
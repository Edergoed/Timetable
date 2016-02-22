<html>
<head>
	<title>HKU Rooster</title>
	<link href="styles/style.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" sizes="300x300" href="favicon.png">
	<meta name="theme-color" content="#1C1D1E">

	<meta charset="UTF-8">
	<meta name="description" content="Een alternatief voor het HKU Rooster gemaakt door Bobbie Goede.">
	<meta name="keywords" content="Rooster, HKU, Hogeschool, Kunsten, Utrecht, Overzichtelijk, Simpel">
	<meta name="author" content="Bobbie Goede">

	<link href="files/favicon_152x152" sizes="152x152" rel="apple-touch-icon">
    <link href="files/favicon_144x144" sizes="144x144" rel="apple-touch-icon">
    <link href="files/favicon_76x76" sizes="76x76" rel="apple-touch-icon">
    <link href="files/favicon_72x72" sizes="72x72" rel="apple-touch-icon">
    <link href="files/favicon_120x120" sizes="120x120" rel="apple-touch-icon">
    <link href="files/favicon_114x114" sizes="114x114" rel="apple-touch-icon">
    <link href="files/favicon_57x57" sizes="57x57" rel="apple-touch-icon">

	<script src="js/jquery.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
</head>
<body>

	<nav style="z-index: 1000"><div id="hamburger" style="display: inline-block; float:left;"></div>
	<a href="files/gi_klasindeling_jaar_1.pdf" target="_blank">Klasindeling 1</a><a href="files/gi_klasindeling_jaar_2.pdf" target="_blank">Klasindeling 2</a>
	</nav>
	<div id="list" class="menuon">
	<div id="links">
	</div>
	</div>
	<div class="content">
			


	</div>

	<?php
	if($_GET['url'] == 'resetcookie'){
			setcookie("hku_class", null, time()+2592000);
	}

	echo "<div class='school' style='height: 0px; overflow: hidden;'>";
		echo file_get_contents('http://lesroostersgames.hku.nl/student/');
		echo "</div>";
	?>

<footer>
	<script src="js/ajax.js"></script>
	<script>


		var linknames = [];
		var linkdestinations = [];
		var links = $('.school a');
		var listlinks = '';
		
		for(var i=0; i<links.length; i++) {
			    linkdestinations.push(links[i].href.substr(links[i].href.lastIndexOf('/') + 1));
			    linknames.push(links[i].textContent);
			    if(i != 4 && i != 17){
			    listlinks += "<a href='#' onclick=\"loadContent('"+linkdestinations[i]+"','"+linknames[i]+"')\">"+linknames[i]+"</a>";
				}
		}
		$('#links').html(''+listlinks+'');


		function checkCookie() {
		    var hku_class = getCookie("hku_class");
		    if (hku_class!="") {
		        var hku_class_link = linknames.indexOf(hku_class);
		  		$(".content").load("rooster.php?url="+linkdestinations[hku_class_link]);
		  		menu();
		    }
		}

		$(document).ready(function(){
		  		$(".content").load("rooster.php?url="+linkdestinations[0]);
		  		menu();
		});
	</script>
</footer>
</body>

</html>
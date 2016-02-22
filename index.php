<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://timetable.deadlinesapp.io/mobile');
?>

<html>
<head>
	<title>HKU Timetable</title>
	<link href="styles/style.css?v=1.1" rel="stylesheet" type="text/css">

	<meta name="apple-mobile-web-app-capable"
          content="yes">

    <!-- Make the app title different than the page title. -->
    <meta name="apple-mobile-web-app-title"
          content="HKU Rooster">

    <!-- Configure the status bar. -->
    <meta name="apple-mobile-web-app-status-bar-style"
          content="black">


    <link href="http://timetable.deadlinesapp.io/files/favicon_152x152.png"
          sizes="152x152"
          rel="apple-touch-icon">

    <!-- iPad retina icon (iOS < 7) -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_144x144.png"
          sizes="144x144"
          rel="apple-touch-icon">

    <!-- iPad non-retina icon -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_76x76.png"
          sizes="76x76"
          rel="apple-touch-icon">

    <!-- iPad non-retina icon (iOS < 7) -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_72x72.png"
          sizes="72x72"
          rel="apple-touch-icon">

    <!-- iPhone 6 Plus icon -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_120x120.png"
          sizes="120x120"
          rel="apple-touch-icon">

    <!-- iPhone retina icon (iOS < 7) -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_114x114.png"
          sizes="114x114"
          rel="apple-touch-icon">

    <!-- iPhone non-retina icon (iOS < 7) -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_57x57.png"
          sizes="57x57"
          rel="apple-touch-icon">

    <!-- iPhone non-retina icon (iOS < 7) -->
    <link href="http://timetable.deadlinesapp.io/files/favicon_60x60.png"
          sizes="60x60"
          rel="apple-touch-icon">

	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" sizes="300x300" href="favicon.png">
	<meta name="theme-color" content="#1C1D1E">
	<script src="js/jquery.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
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
	<a href="files/gi_klasindeling_jaar_1.pdf" target="_blank">Klasindeling 1</a><a href="files/gi_klasindeling_jaar_2.pdf" target="_blank">Klasindeling 2</a>
	</nav>
	<div id="list" class="menuon">
		<div id="student_button" class="list_button">STUDENT</div><div id="docent_button" class="list_button" style="background-color: #CCC;">TEACHER</div>
		<div id="links" class="menuon"></div>
		<div id="links-docent" class="menuoff"></div>
	</div>
	<div class="content">

		<div class="load_container">
			<div class="load_wrapper"><div class='loading'></div></div>
			<div class='deadlines'>Deadlines coming soon</div>
		</div>

	</div>

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

<footer>
	<script src="js/ajax.js?v=1.1"></script>
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

		function checkCookie() {
		    var hku_class = getCookie("hku_class");
		    var hku_class_link = linknames.indexOf(hku_class);
		    var hku_teacher_link = linknames_d.indexOf(hku_class);
		    if (hku_class != "" || hku_class == "undefined") {
		        if(hku_class_link != -1){
			  		$(".content").load("rooster.php?url=/student/"+linkdestinations[hku_class_link]);
			  		menu();
		  		}else if(hku_class_link != 1){
		  			$(".content").load("rooster.php?url=/docent/"+linkdestinations_d[hku_teacher_link]);
			  		menu();
		  		}
		    }
		}

		$(document).ready(checkCookie);
	</script>
</footer>
</body>

</html>

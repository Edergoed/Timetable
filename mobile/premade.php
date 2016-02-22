<html>
<head>
	<title>HKU Rooster</title>
	<link href="styles/mobile.css" rel="stylesheet" type="text/css">

    <meta charset="UTF-8">
	<meta name="description" content="Een alternatief voor het HKU Rooster gemaakt door Bobbie Goede.">
	<meta name="keywords" content="Rooster, HKU, Hogeschool, Kunsten, Utrecht, Overzichtelijk, Simpel">
	<meta name="author" content="Bobbie Goede">

	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="HKU Rooster">
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
	
	<script src="js/jquery.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/jquery.dynatable.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41320767-3', 'auto');
	  ga('send', 'pageview');
	</script>


</head>
<body>

	<div id="mobile"><div id="curday"><div class="load_container"><div class='loading'></div></div></div></div>
	<div class="content"></div>

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
		addDay = 0;

		function getDate(){
			today = new Date();
			today.setDate(today.getDate() + addDay); 

			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();

			if(today.getDay() == 6 || today.getDay() == 0){
				if(today.getDay() == 6){
					addDay += 2;
				}if(today.getDay() == 0){
					addDay -= 2;
				}
				// console.log(today.getDay() + " current day of week.");
				
				today = new Date();
				today.setDate(today.getDate() + addDay); 

				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
			}

			if(dd<10){
			    dd='0'+dd
			} 
			if(mm<10){
			    mm='0'+mm
			} 
			currentDate = today;
			today = dd+'-'+mm+'-'+yyyy;
			// console.log(today);

			// showDay(today);
		}

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

		var d = new Date();
		var weekday = new Array(7);
		weekday[0]=  "Sunday";
		weekday[1] = "Monday";
		weekday[2] = "Tuesday";
		weekday[3] = "Wednesday";
		weekday[4] = "Thursday";
		weekday[5] = "Friday";
		weekday[6] = "Saturday";

		// var n = weekday[d.getDay()];


		function checkCookie() {
		    var hku_class = getCookie("hku_class");
		    if (hku_class!="") {
		        var hku_class_link = linknames.indexOf(hku_class);
		  		$(".content").load("rooster.php?url="+linkdestinations[hku_class_link],function (){
					showDay(today);
					$("#current_class").html(hku_class);
				});
		  		// menu();
		    }else{
		    	menu();
		    }
		}

		$(document).mouseup(function (e)
		{
		    var container = $(".menuon");
		    var hamburger = $("#hamburger");

		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0 && $(".menuoff").length != 1 || hamburger.is(e.target)) // ... nor a descendant of the container
		    {
		        menu();
		    }
		});

		$(document).ready(function(){
			getDate();
			checkCookie();
			
		});

		function showDay(today){
				// $('#curday').html("<div class='loading'></div>");
				var target_table = $('.content tr:contains("'+today+'")').clone();
				$('#curday').html(target_table);
				$('#curday').promise().done(function (){
					$('#curday').each(function (){
			            $(this).replaceWith( "<div id='curday'>"+$(this).html()
			            	.replace(/<tr/, "")
			             	.replace(/<\/tr>/, "")
			                .replace(/<td/, "<div class=\"les_blok\"")
			                .replace(/<\/td>/, "</div>")
			                .replace(/&nbsp;/g, "")
			            );
			        });

		        }).then(function (){
		        	var curday_children = $('#curday').children();
			    	$('#curday').html(curday_children);
			    	var lesblok_children = $('.les_blok').children();
			    	$('.les_blok').html(lesblok_children);

		        }).then(function (){
		        	var weekDag = weekday[currentDate.getDay()];
		        	// $('#curday').prepend('<div class="date_nav"><div id="minus" class="date_button" onclick="changeDay()" style="float: left; text-align: left;"></div><div class="date_button" onclick="resetDay()" style="width: 60%; color: #000; background-color: #FFF; display: inline-block;">'+weekDag+" "+today.slice(0, -5)+'</div><div id="plus" class="date_button" onclick="changeDay(1)" style="float: right; text-align: right;"></div></div>');
		        	$("br").remove();
		        	$('td:empty').remove();
		        	$('#curday > font').remove();

		        	if($('.les_blok').is(':empty')){
		        		$('.les_blok').css('margin-top', '0px')

			        	if( $('.les_blok').is(':empty') && $('#curday > table').length < 1 ) {
			        		$('.les_blok').css('margin-top', '20px')
			        		$('.les_blok').html("<div style='width: 100%; height: 200px; background-color: #FFF; text-align: center; padding: 80px 40px; box-sizing: border-box;'>Looks like there are no lessons planned for today!</div>");
			        		
			        	}
		        	}

		        });

		        
		}
	</script>
</footer>
</body>

</html>

<script>
		loadContent('7P00031.htm','GAR2-B');
		menu();
</script>
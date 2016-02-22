$(document).ready(function() {
	checkCookie();
	getDate();


	$( '#hamburger' ).click(function() {
		menu();
	});
	$( '#plus' ).click(function() {
		changeDay(1)
	});
	$( '#minus' ).click(function() {
		changeDay();
	});
	$("body").keydown(function(e) {
		if(e.keyCode == 37) { // left
		    changeDay()
	  	}
	  	else if(e.keyCode == 39) { // right
		    changeDay(1)
	  	}
	  });
	$( '#student_button' ).click(function() {
		document.getElementById("links").className = "menuon";
		document.getElementById("links-docent").className = "menuoff";
		document.getElementById("student_button").style.backgroundColor = "";
		document.getElementById("docent_button").style.backgroundColor = "#CCC";
	});
	$( '#docent_button' ).click(function() {
		document.getElementById("links").className = "menuoff";
		document.getElementById("links-docent").className = "menuon";
		document.getElementById("docent_button").style.backgroundColor = "";
		document.getElementById("student_button").style.backgroundColor = "#CCC";
	});
});

function changeDay(plus){
	if(plus){
		addDay++;
	}else{
		addDay--;
	}
	getDate();
	showDay(today);
}

function resetDay(){
	current_day = new Date();
	addDay = 0;
	if(current_day.getDay() == 6){
		addDay += 2;
	}if(current_day.getDay() == 0){
		addDay += 1;
	}
	getDate();
	showDay(today);
}

function loadContent(id, name){
	var url = 'rooster.php?url=/student/' + id;
	menu();
	$("#curday").html('<div class="load_container"><div class="load_wrapper"><div class="loading"></div></div><div class="deadlines">Deadlines coming soon</div></div>');
	$(".content").load(url, function() {
		showDay(today);
	});
	$('#curday').promise().done(function (){
		setCookie("hku_class", name, 365);
		$("#current_class").html(name);
	});
}

function loadContent_d(id, name){
	var url = 'rooster.php?url=/docent/' + id;
	menu();
	$("#curday").html('<div class="load_container"><div class="load_wrapper"><div class="loading"></div></div><div class="deadlines">Deadlines coming soon</div></div>');
	$(".content").load(url, function() {
		showDay(today);
    });

	$('#curday').promise().done(function (){
		setCookie("hku_class", name, 365);
		$("#current_class").html(name);
	});
}

function menu() {
	if(document.getElementById("list").className == "menuon"){
		document.getElementById("list").className = "menuoff";

	} else {
		document.getElementById("list").className = "menuon";
	}
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

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
    var hku_class_link = linknames.indexOf(hku_class);
	var hku_teacher_link = linknames_d.indexOf(hku_class);
	current_day = new Date();
	if (hku_class != "" || hku_class =="undefined") {
		if(hku_class_link != -1){
			$(".content").load("rooster.php?url=/student/"+linkdestinations[hku_class_link],function (){
				if(current_day.getDay() == 6){
					addDay += 2;
					getDate();
				}if(current_day.getDay() == 0){
					addDay += 1;
					getDate();
				}
				showDay(today);
				$("#current_class").html(hku_class);
			});
			}else if(hku_class_link != 1){
				$(".content").load("rooster.php?url=/docent/"+linkdestinations_d[hku_teacher_link],function (){
					if(current_day.getDay() == 6){
						addDay += 2;
						getDate();
					}if(current_day.getDay() == 0){
						addDay += 1;
						getDate();
					}
					showDay(today);
					$("#current_class").html(hku_class);
				});
			}
		}else{
			menu();
		}
}

// $(document).mouseup(function (e)
// {
//     var container = $(".menuon");
//     var hamburger = $("#hamburger");

//     if (!container.is(e.target) // if the target of the click isn't the container...
//         && container.has(e.target).length === 0 && $(".menuoff").length != 1 || hamburger.is(e.target)) // ... nor a descendant of the container
//     {
//         menu();
//     }
// });

// $(document).ready(function(){
	
	
// });

function showDay(today){
		// $('#curday').html("<div class='loading'></div>");
		var target_table = $('.content tr:contains("'+today+'")').clone();
		$('#curday').html(target_table);
		var name = getCookie("hku_class");
		if(name.indexOf("_") != -1){
			var first = name.split("_");
			var reg = new RegExp(first[0], "gi");
		}
		$('#curday').promise().done(function (){
			$('#curday').each(function (){
	            $(this).replaceWith( "<div id='curday'>"+$(this).html()
	            	.replace(/<tr/, "")
	             	.replace(/<\/tr>/, "")
	                .replace(/<td/, "<div class=\"les_blok\"")
	                .replace(/<\/td>/, "</div>")
	                .replace(/&nbsp;/g, "")
	        		.replace(reg, "")
	            );
	        });

        }).then(function (){
        	var curday_children = $('#curday').children();
	    	$('#curday').html(curday_children);
	    	var lesblok_children = $('.les_blok').children();
	    	$('.les_blok').html(lesblok_children);

        }).then(function (){
        	var weekDag = weekday[currentDate.getDay()];
        	$('#curday').prepend('<div class="date_nav"><div id="minus" class="date_button" onclick="changeDay()" style="float: left; text-align: left;"></div><div class="date_button" onclick="resetDay()" style="width: 60%; color: #000; background-color: #FFF; display: inline-block;">'+weekDag+" "+today.slice(0, -5)+'</div><div id="plus" class="date_button" onclick="changeDay(1)" style="float: right; text-align: right;"></div></div>');
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


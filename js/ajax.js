$(document).ready(function() {
	$( '#hamburger' ).click(function() {
		menu();
		
		// $.toggle(function() {
		// 	document.getElementById("links").className = "menuon";
	 //    	}, function() {
	 //    	document.getElementById("links").className = "menuoff";
	 //    });
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
function loadContent(id, name){
	// var url = 'rooster.php?url=' + id;
	// menu();
	// setCookie("hku_class", name, 365);
	// $(".content").load(url);

	var url = 'rooster.php?url=/student/' + id;
	menu();
	$(".content").html('<div class="load_container"><div class="load_wrapper"><div class="loading"></div></div><div class="deadlines">Deadlines coming soon</div></div>');
	$(".content").load(url, function() {
	});
	$('.content').promise().done(function (){
		setCookie("hku_class", name, 365);
		// $("#current_class").html(name);
	});
}

function loadContent_d(id, name){
	var url = 'rooster.php?url=/docent/' + id;
	menu();
	$(".content").html('<div class="load_container"><div class="load_wrapper"><div class="loading"></div></div><div class="deadlines">Deadlines coming soon</div></div>');
	$(".content").load(url, function() {
	});
	$('.content').promise().done(function (){
		setCookie("hku_class", name, 365);
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


<?php
date_default_timezone_set('Europe/Amsterdam');
$year=date("Y");
$date = date();

if(date("w") == 6 || date("w") == 0) {
	$currentweek = date("W", strtotime('+1 Week'));
} else {
	$currentweek = date("W");
}

$dto = new DateTime();
$result['start'] = $dto->setISODate($year, $currentweek, 1)->format('d-m-Y');
$result['end'] = $dto->setISODate($year, $currentweek, 7)->format('d-m-Y');

	if(isset($_GET['url']) && $_GET['url'] != 'resetcookie'){
		echo file_get_contents('http://lesroostersgames.hku.nl'.$_GET['url']);
		echo '
		<script>
			var curDate = $("tr:contains(van '.$result['start'].')");
			$.scrollTo(curDate,600);
		</script>
		';

	}else{
		echo "NO URL ERROR, MESSAGE BOBBIE";
	}

?>
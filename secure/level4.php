<?php
# Підключення бд
$main= new mysqli("localhost", "t95835_dodiki_us", "Str@t0spherE", "t95835_dodiki");
$new_name = strip_tags($_POST['new-name']);
$new_surname = strip_tags($_POST['new-surname']);
$new_country = strip_tags($_POST['new-country']);
$new_work = strip_tags($_POST['new-work']);
$new_danger = strip_tags($_POST['new-danger']);
if($new_danger > 10){
	$new_danger = 10;
} else if($new_danger < 1){
	$new_danger = 1;
}
if(isset($_POST['new-add'])){
	$main->query("INSERT INTO `profile` (`name`, `surname`, `country`, `work`, `danger`) 
        	VALUES ('$new_name', '$new_surname', '$new_country', '$new_work', '$new_danger')");
	header("Location: ./level4.php");
	$fBefore = htmlentities(file_get_contents("../data/progress.txt"));
	$fd = fopen('../data/progress.txt', 'w');
	$today = date("G:i, j/n/Y");
	fwrite($fd, $fBefore . "\n\nNew person added at ".$today."\n\tName: ".$new_name."\n\tSurname: ".$new_surname."\n\tCountry: ".$new_country."\n\tWork: ".$new_work."\n\tDanger: ".$new_danger);
	fclose($fd);
}
$main->close();

date_default_timezone_set("Europe/Kiev");
$fBefore = htmlentities(file_get_contents("../data/secure.txt"));
$border = "---------------------------------------------------";
$fd = fopen('../data/secure.txt', 'w');
$today = date("j/n/Y, G:i");
fwrite($fd, $fBefore . "\n\n\t" . $border . "\n\t| New entering: " . $today . "\tBy Ukrainian time |" ."\n\t" . $border);
fclose($fd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<? if($_COOKIE['first'] != '' && $_COOKIE['second'] != '' && $_COOKIE['third'] != ''): ?>
<main class="container">
	<h1 align="center">Додіки</h1>
	<? require "../data/table.php"; ?>
</main>
<div class="navigate">
	<form action="" method="post" class="form-table">
		<input type="text" name="new-name" class="form-control" placeholder="Name: ">
		<input type="text" name="new-surname" class="form-control" placeholder="Surname: ">
		<input type="text" name="new-country" class="form-control" placeholder="Country: ">
		<input type="text" name="new-work" class="form-control" placeholder="Work: ">
		<input type="number" name="new-danger" class="form-control" placeholder="Danger: ">
		<button type="submit" class="form__btn" class="form-control" name="new-add">Add</button>
	</form>
</div>
	<? else: ?>
        <head>
            <meta http-equiv="refresh" content="1;URL=https://pravyysektor.info/" />
        </head>
		<? setcookie("quit", true, time()+3600*24*365); ?>
    <? endif ?>
</body>
</html>
<?php
# Підключення бд
$main= new mysqli("localhost", "root", "", "dodiki");
$new_name = $_POST['new-name'];
$new_surname = $_POST['new-surname'];
$new_country = $_POST['new-country'];
$new_work = $_POST['new-work'];
$new_danger = $_POST['new-danger'];
if($new_danger > 10){
	$new_danger = 10;
} else if($new_danger < 1){
	$new_danger = 1;
}
if(isset($_POST['new-add'])){
	$main->query("INSERT INTO `profile` (`name`, `surname`, `country`, `work`, `danger`) 
        	VALUES ('$new_name', '$new_surname', '$new_country', '$new_work', '$new_danger')");
	header("Location: ./level4.php");
}
$main->close();
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
<main class="container">
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
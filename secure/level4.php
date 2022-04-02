<?php
# Підключення бд
$main= new mysqli("localhost", "root", "", "dodiki");
$new_name = $_POST['new-name'];
$new_surname = $_POST['new-surname'];
$new_country = $_POST['new-country'];
$new_work = $_POST['new-work'];
$new_danger = $_POST['new-danger'];
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
    <title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
	<? if($_COOKIE['first'] != '' && $_COOKIE['second'] != '' && $_COOKIE['third'] != ''): ?>
	<?php
	$main= new mysqli("localhost", "root", "", "dodiki");
	$reserv = new mysqli("localhost", "root", "", "reserv");

	if($result = $main->query("SELECT * FROM `profile`")){
    	$mysql2->query("TRUNCATE TABLE  `profile`"); // Очищення тіблиці
    	$rowsCount = $result->num_rows; // Кількість отриманих рядків

	
		######### Малювання таблиці #########
	
    	echo "<table><tr><th>Id</th><th>Name</th><th>Surname</th><th>Country</th><th>Work</th><th>Danger</th></tr>";
    	foreach($result as $row){
		
        	$id = $row["id"];
        	$name = $row["name"];
        	$surname = $row["surname"];
        	$country = $row["country"];
        	$work = $row["work"];
        	$danger = $row["danger"];

        	echo "<tr>";
            	echo "<td>" . $id . "</td>";
            	echo "<td>" . $name . "</td>";
            	echo "<td>" . $surname . "</td>";
				echo "<td>" . $country . "</td>";
				echo "<td>" . $work . "</td>";
				echo "<td>" . $danger . "</td>";
        	echo "</tr>";
		
        	$reserv->query("INSERT INTO `profile` (`id`, `name`, `surname`, `country`, `work`, `danger`) 
        	VALUES ('$id', '$name', '$surname', '$country', '$work', '$danger')"); // Створення резервного запису в іншу таблицю
    }
    echo "</table>";
    $result->free();
}
$main->close();
$reserv->close();
?>
</main>
<div class="navigate">
	<form action="" method="post" class="form">
		<input type="text" name="new-name" placeholder="Name: ">
		<input type="text" name="new-surname" placeholder="Surname: ">
		<input type="text" name="new-country" placeholder="Country: ">
		<input type="text" name="new-work" placeholder="Work: ">
		<input type="number" name="new-danger" placeholder="Danger: ">
		<button type="submit" class="form__btn" name="new-add">Add</button>
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
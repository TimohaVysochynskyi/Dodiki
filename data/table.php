<?php
	$main= new mysqli("localhost", "root", "", "dodiki");
	$reserv = new mysqli("localhost", "root", "", "reserv");

	if($result = $main->query("SELECT * FROM `profile`")){
    	$reserv->query("TRUNCATE TABLE  `profile`"); // Очищення тіблиці
    	$rowsCount = $result->num_rows; // Кількість отриманих рядків

	
		######### Малювання таблиці #########
	
    	echo "<table><tr><th>Id</th><th>Name</th><th>Surname</th><th>Country</th><th>Work</th><th>Danger</th></tr>";
    	foreach($result as $row){
		
        	$id = $row["id"];
        	$name = $row["name"];
        	$surname = .$row["surname"];
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
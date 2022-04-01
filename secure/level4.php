<?php
$mysql = new mysqli("localhost", "root", "", "dodiki");
$mysql2 = new mysqli("localhost", "root", "", "reserv");


if($result = $mysql->query("SELECT * FROM `profile`")){
    $mysql2->query("TRUNCATE TABLE  `profile`");
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Возраст</th></tr>";
    foreach($result as $row){
        $id = $row["id"];
        $name = $row["name"];
        $surname = $row["surname"];
        $country = $row["country"];
        $work = $row["work"];
        $danger = $row["danger"];
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["surname"] . "</td>";
        echo "</tr>";
        $mysql2->query("INSERT INTO `profile` (`id`, `name`, `surname`, `country`, `work`, `danger`) 
        VALUES ('$id', '$name', '$surname', '$country', '$work', '$danger')");
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $mysql->error;
}

$mysql->close();
$mysql2->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
<?php
$file = '../data/progress.txt';
$fd = fopen($file, 'w');

$pin = $_POST['pin'];

if(isset($_POST['submit'])){
    if ($pin == 6336){
        setcookie("third", true, time()+3600, "/");
        fwrite($fd, "complete3");
        echo "\t\nComplete\n\n";
        header("Location: ./level4.php");
    } else {
        fwrite($fd, "fail3");
        header("Location: https://pravyysektor.info/");
        fclose($fd);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 3</title>
</head>
<body>
    <? if($_COOKIE['first'] != '' && $_COOKIE['second'] != ''): ?>
    <form action="" method="post">
        <input type="password" name="pin">
        <button type="submit" name="submit">Submit</button>
    </form>
    <? else: ?>
        <head>
            <meta http-equiv="refresh" content="1;URL=https://pravyysektor.info/" />
        </head>
    <? endif ?>

</body>
</html>
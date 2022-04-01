<?php
$file = '../data/progress.txt';
$fd = fopen($file, 'w');

$login = $_POST['login'];
$pass = $_POST['pass'];

if(isset($_POST['submit'])){
    if ($login == "donkarleone" && $pass == "TerminatorT1000"){
        setcookie("second", true, time()+3600, "/");
        fwrite($fd, "complete2");
        echo "\t\nComplete\n\n";
        header("Location: ./level3.php");
    } else {
        fwrite($fd, "fail2");
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
    <title>Level 2</title>
</head>
<body>
    <? if($_COOKIE['first'] != ''): ?>
    <form action="" method="post">
        <input type="text" name="login">
        <input type="password" name="pass">
        <button type="submit" name="submit">Submit</button>
    </form>
    <? else: ?>
        <head>
            <meta http-equiv="refresh" content="1;URL=https://pravyysektor.info/" />
        </head>
    <? endif ?>

</body>
</html>
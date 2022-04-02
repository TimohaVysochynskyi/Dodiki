<?php
$pin = $_POST['pin'];

if(isset($_POST['submit'])){
    if ($pin == 6336){
        setcookie("third", true, time()+3600, "/");
        header("Location: ./level4.php");
    } else {
        header("Location: https://pravyysektor.info/");
		setcookie("quit", true, time()+3600*24*365);
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
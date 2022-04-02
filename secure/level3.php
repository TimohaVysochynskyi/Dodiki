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
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<main class="container">
    <? if($_COOKIE['first'] != '' && $_COOKIE['second'] != ''): ?>
    <form action="" method="post" class="form-secure">
		<h2>PIN code</h2>
        <input type="password" class="form-control" name="pin" placeholder="PIN code">
        <button type="submit" name="submit" class="form__btn">Submit</button>
    </form>
    <? else: ?>
        <head>
            <meta http-equiv="refresh" content="1;URL=https://pravyysektor.info/" />
        </head>
    <? endif ?>
	</main>
</body>
</html>
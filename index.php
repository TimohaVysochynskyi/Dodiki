<?php
    /*if($_COOKIE['quit'] == ''){
        require "data/check-ip.php";
        if(/*$IPcountry == "Ukraine" && $IPcity == "Kyiv" || $IPcountry == "Ukraine && $IPcity == "Rokytne"*//* $IPcity == "Brno" || $IPcity == "Ostopovice") {
            header("Location: ./secure/level2.php");
        } else {
			exit();
            header("Location: https://pravyysektor.info/");
            setcookie("quit", true, time()+3600*24*365);
        }
    } else{
        header("Location: https://pravyysektor.info/");
    }*/
    setcookie("first", true, time()+3600, "/");
    exit(header("Location: ./secure/level2.php"));
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
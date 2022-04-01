<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $file = '../data/progress.txt';
    $fd = fopen($file, 'w');
    /*if($_COOKIE['quit'] == ''){
        require "data/check-ip.php";
        if($IPcountry == "Ukraine" || $IPcountry == "Czech Republic") {
            header("Location: ");
        } else {
            header("Location: https://pravyysektor.info/");
            exit();
            setcookie("quit", true, time()+3600*24*365);
        }
    } else{
        header("Location: https://pravyysektor.info/");
    }*/
    header("Location: ./secure/level2.php");
    setcookie("first", true, time()+3600, "/");
    fwrite($fd, "complete1");
    fclose($fd);
    ?>
</body>
</html>
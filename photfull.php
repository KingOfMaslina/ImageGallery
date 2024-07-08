<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="in.css" rel="stylesheet">
    <title>ImSite</title>
</head>
<body class ="body">
<header class = "hed">

<div class="logdiv">
<img class ="img" src="logo.png">
</div>

<div class="hedline">
<button type="button" class="hom"><a href="mainpage.php">HOME</a></button> 
<button type="button" class="cre"><a href="profile.php">CREATE</a></button> 
<input type="search" class="serch"id="" name="q" />
        <button type="button" class="prof"><a href="profile.php">п</a></button> 
        </div>
        </header>


        <div class="create">
            <?php
            if (isset($_POST["name"]) && isset($_POST["user"])&& isset($_POST["image"])&& isset($_POST["access"])&& isset($_POST["id"])) {
                $name = $_POST["name"];
                $user = $_POST["user"];
                $image = $_POST["image"];
                $access = $_POST["access"];
                $id = $_POST["id"];

                echo "<a><img width='70%' height='70%' src='$image'></a>";
                echo "<a>" . $name . "</a>";
                echo "<a>" . "<a>Автор:  </a>" . $user . "</a>";
            }
            ?>

        </div>
     
      
        
</body>
</html>
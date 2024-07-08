<?php
session_start();
$login = $_SESSION['login'];
$userid = $_SESSION['Id'];
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
<p><a href="mainpage.php"><img class ="img"  href="mainpage.php" src="logo.png"></a></p>
</div>

    <div class="hedline">
    
        <button type="button" class="cre"><a href="profile.php">CREATE</a></button> 
        <input type="search" class="serch"id="" name="q" />
        <?php
                   echo "<button type = 'button' class = 'prof'><a href='profile.php'>".$username."</a></button>";
            ?>
    </div>
        </header>

        <form action ="imagecreate.php" method="post" enctype="multipart/form-data" >
            <?php
            echo "<div class = 'input-form'>";
            echo "<input type='hidden' name='user' value = ".$_SESSION['login'] ."><br/><br/>";
            echo "<input type='hidden' name='userid' value = ".$_SESSION['Id'] ."><br/><br/>";
            echo "</div>";
            ?>
        <div class="file">
        <label for="avatar">Select File</label>
            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
        <input type="text" placeholder="Название" name = "name">

        <select name ="access">
            <option value="Публичный">Публичный</option>
            <option value="Приватный">Приватный</option>
        </select>
        </div>
            <input type="submit" name="mor" value="CREATE">
        </form>
        
</body>
</html>
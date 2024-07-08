<?php
session_start();
$id = $_SESSION['Id'];
$userava = $_SESSION['Ava'];
$login = $_SESSION['login'];
$email = $_SESSION['mail'];
$password = $_SESSION['password'];
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
<form action="mainpage.php" method="post">
    <div class="input-group">
        <input type="text" class="serch"  name="search" id="" placeholder="Search...">
    </div>
</form>
<?php
session_start();
$username = $_SESSION['login'];
   echo "<button type = 'button' class ='prof'><a href='profile.php'>".$username."</a></button>";
    ?>
<button type="button" class="cre"><a href="create.php">CREATE</a></button>
<div class="avatmini">
<?php

   echo "<div class='div_avat>'";
    echo "<a><img  href='mainpage.php' src=".$userava."></a>";
   echo"</div>";
?>
</div>
</div>

</header>

<div class="profilefull">

    <div class="prof_mini">
<?php
					session_start();
        echo "<div class='div_avat>'";
            echo '<a><img  src='.$userava.'></a>';
        echo"</div>";

        echo "<form action='edit.php' method='post'  enctype='multipart/form-data'>";
        echo "<input type='file' id='avatar' name='avatar' accept='image/png, image/jpeg'/>";
        echo "<input type='hidden' name='id' value= '$id' >";
        echo "<div class='prof_text'>";
        echo "<input type='text' value = '$login'name = 'name'>";
        echo"</div>";
        echo "<div class='prof_text'>";
        echo "<input type='text' value = '$email'name = 'email'>";
        echo"</div>";
        echo "<div class='prof_text'>";
        echo "<input type='text' value = '$password'name = 'password'>";
        echo"</div>";
        echo "<input type='submit' value='Изменить'>";
        echo "</form>";
?>

    </div>

    <div class="prof_phot">

        <?php
        $uname = $_SESSION['login'];
        $conn = new mysqli("localhost", "root", "", "imageDB");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM image WHERE user_id = '$id'";
        if($result = mysqli_query($conn, $sql))

            foreach($result as $row){
                $name = $row['name'];
                $user = $row['user'];
                $access = $row['access'];

                echo'<div class="maincontprof">';
                echo "<a><img src=".$row["image"]."></a>";
               // echo "<a>" . $row["name"] . "</a>";

                echo "<form action ='photfull.php' method='post'>";
                echo "<input type='hidden' name='id' value=".$row['id'] .">";
                echo "<input type='hidden' name='name' value='$name'>";
                echo "<input type='hidden' name='user' value='$user'>";
                echo "<input type='hidden' name='image' value=".$row['image'].">";
                echo "<input type='hidden' name='access' value='$access'>";
                echo "<input type='submit' value='Перейти'>";
                echo "</form>";

                echo "<form action ='detete.php' method='post'>";
                echo "<input type='hidden' name='id' value=".$row['id'] .">";
                echo "<input type='submit' value='Удалить'>";


                echo'</div>';
            }


        ?>

       
    </div>



</body>
</html>
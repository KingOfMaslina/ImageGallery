<?php
session_start();
$userava = $_SESSION['Ava'];
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

        <main class="main">

            <?php
            if (isset($_POST["search"]) ) {
                $search = $_POST["search"];
                $conn = new mysqli("localhost", "root", "", "imageDB");
                if ($conn->connect_error) {
                    die("Ошибка: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM image WHERE name LIKE '%$search%'";
                if ($result = mysqli_query($conn, $sql))

                    foreach ($result as $row) {
                        $name = $row['name'];
                        $user = $row['user'];
                        $access = $row['access'];

                        echo '<div class="maincont">';
                        echo "<a><img 'width='100%'  height='100%' src=" . $row["image"] . "></a>";
                        //echo "<a type='hidden'>" . $row["name"] . "</a>";

                        echo "<form class = 'formphotfull' action ='photfull.php' method='post'>";
                        echo "<input type='hidden' name='id' value=" . $row['id'] . ">";
                        echo "<input type='hidden' name='name' value='$name'>";
                        echo "<input type='hidden' name='user' value='$user'>";
                        echo "<input type='hidden' name='image' value=" . $row['image'] . ">";
                        echo "<input type='hidden' name='access' value='$access'>";
                        echo "<input type='submit' name='formsub' value='Перейти'>";

                        echo "</form>";
                        echo '</div>';
                    }

            }
            else
            {
                $conn = new mysqli("localhost", "root", "", "imageDB");
                if ($conn->connect_error) {
                    die("Ошибка: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM image WHERE access = 'Публичный'";
                if ($result = mysqli_query($conn, $sql))

                    foreach ($result as $row) {
                        $name = $row['name'];
                        $user = $row['user'];
                        $access = $row['access'];

                        echo '<div class="maincont">';
                        echo "<a><img width='100%' height='100%' src=" . $row["image"] . "></a>";
                       // echo "<a type='hidden'>" . $row["name"] . "</a>";

                        echo "<form action ='photfull.php' method='post'>";
                        echo "<input type='hidden' name='id' value=" . $row['id'] . ">";
                        echo "<input type='hidden' name='name' value='$name'>";
                        echo "<input type='hidden' name='user' value='$user'>";
                        echo "<input type='hidden' name='image' value=" . $row['image'] . ">";
                        echo "<input type='hidden' name='access' value='$access'>";
                        echo "<input type='submit' value='Перейти'>";

                        echo "</form>";
                        echo '</div>';
                    }
            }
            ?>
            </div>
        </main>
        
        <button type="button" class="mor">MORE</button> 
        
</body>
</html>
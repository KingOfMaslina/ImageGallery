<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "imageDB");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
if(isset($_POST["login"]) && isset($_POST["pass"]))
{
    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    $sql = "SELECT COUNT(*) FROM users WHERE name = '$login' and password = '$pass' ";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_array($result);
    echo $row1["COUNT(*)"];
    if($row1["COUNT(*)"] == 1){
        $sql1 = "SELECT * FROM users WHERE name = '$login' and password = '$pass' ";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($result1);
        $_SESSION['login'] = $row['name'];
        $_SESSION['mail'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['Ava'] = $row['avatar'];
        $_SESSION['Id'] = $row['id'];
        header("Location: mainpage.php");
    }
    else{
        echo "Пользователь не найден";
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
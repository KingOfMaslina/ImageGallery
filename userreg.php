<?php
if (move_uploaded_file($_FILES['avatar'] ['tmp_name'], 'temp/'.  $_FILES['avatar'] ['name'])){
    echo "все ок";

}else{
    echo "не ок";

}
if (isset($_POST["login"]) && isset($_POST["pass"])) {

    $conn = mysqli_connect("localhost", "root", "", "imageDB");
    if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
    }
    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    $ava = mysqli_real_escape_string($conn, 'temp/'.  $_FILES['avatar'] ['name']);
    $sql = "INSERT INTO users (`name`, `email`, `password`, `avatar`) VALUES ('$login', '$mail','$pass','$ava')";
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
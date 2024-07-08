<?php
session_start();

if (move_uploaded_file($_FILES['avatar'] ['tmp_name'], 'temp/'.  $_FILES['avatar'] ['name'])){
    echo "все ок";

}else{
    echo "не ок";

}
if (isset($_POST["name"])) {

    $conn = mysqli_connect("localhost", "root", "", "imageDB");
    if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["userid"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $access = mysqli_real_escape_string($conn, $_POST["access"]);
    $avatar = mysqli_real_escape_string($conn, 'temp/'.  $_FILES['avatar'] ['name']);
    $sql = "INSERT INTO `image`( `user`,`user_id`, `image`, `name`, `access`) VALUES ('$user','$userid','$avatar','$name','$access')";
    if(mysqli_query($conn, $sql)){
        header("Location: mainpage.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
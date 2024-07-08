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
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $avatar = mysqli_real_escape_string($conn, 'temp/'.  $_FILES['avatar'] ['name']);
    $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', avatar = '$avatar' WHERE id = '$userid'";

    if(mysqli_query($conn, $sql)){
        header("Location: profile.php");
        $_SESSION['Ava'] = $avatar;
        $_SESSION['login'] = $name;
        $_SESSION['mail'] = $email;
        $_SESSION['password'] = $password;
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
else{
    echo "Некорректные данные";
}

?>
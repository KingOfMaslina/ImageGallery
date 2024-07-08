<?php
$conn = mysqli_connect("localhost", "root", "", "imageDB");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM image WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        header("Location: profile.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
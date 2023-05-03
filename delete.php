<?php
include "dbconnect.php";
// $data = json_decode(file_get_contents('php://inpute'));
if (isset($_GET["delete"])){
    $id=$_GET["delete"];

    $conn="DELETE FROM  `blog` WHERE id = $id";
    $result=mysqli_query($dbconnect,$conn);
    if ($result) {
        // return to the blog page that information was deleted.
        header("Location: signin.php");
    } else {
        echo "Faild to delete file";
    }
}
// header("location:/CRUD12/display.php");
// exit;


?>
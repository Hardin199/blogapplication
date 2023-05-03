<?php
include 'dbconnect.php';
$data = json_decode(file_get_contents('php://input'));

if (isset($_GET["edit"])){
    $id=$_GET["edit"];

    $conn= 'SELECT * FROM  `blog` WHERE id = $id';
    $result=mysqli_query($dbconnect,$conn);
    if ($result) {
        // return to the blog page that information was deleted.
        // header("Location: signin.php");
        $response = json_encode(['status' => 'Successful', 'message' => 'edited and saved successfully.', 'id' => $id]);

            echo $response;
            return;
    } else {
        echo "Faild to edit file";
    }
}

?>
<?php
require 'dbconnect.php';

$data = json_decode(file_get_contents('php://input'));
if (!empty($data->email) && !empty($data->password)) {

    $email = filter_var($data->email, FILTER_SANITIZE_EMAIL);

    $password = filter_var($data->password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $conn = "SELECT * FROM blog WHERE email = '$email'";

    $result = $dbconnect->query($conn);
    // $result = mysqli_query($dbconnect, $conn);

    if ($result->num_rows > 0) {
        $md5pass = md5($password);
        $row = $result->fetch_array();

        $id = $row['id'];

        $email = $row['email'];

        $password = $row['password'];

        if ($email === $email && $md5pass === $password) {

            $response = json_encode(['status' => 'Login-in Successful', 'message' => 'signed in.', 'user_id' => $id]);

            echo $response;
            return;
        }


    } else {

        $response = json_encode(['status' => 'error 404', 'message' => 'Invalid Details, Kindly Re-enter your Details.']);

        echo $response;
        return;
    }

} else {
    $response = json_encode(['status' => 'error 101', 'message' => 'Kindly Fill in All Fields.']);

    echo $response;
    return;
}
// Close the database connection
$db_con->close();

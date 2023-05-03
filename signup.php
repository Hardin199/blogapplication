<?php
include 'dbconnect.php';

$data = json_decode(file_get_contents('php://input'));

    
if(!empty($data->name) && !empty($data->username) && !empty($data->email)
 && !empty($data->password)){

        $name = filter_var($data->$name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($data->$username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($data->email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($data->password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $md5pass = md5($password);
    
        $conn = 'INSERT INTO blog (name,username,email, password)
         VALUES("'.$name.'","'.$username.'","'.$email.'","'.$md5pass.'")';
    
       $result = mysqli_query($dbconnect, $conn);
    
    if($result){

        // direct me to my create a post page
        header("Location: signin.php");
    
        // $response = json_encode(['status'=>'success','message'=>'Registration Succesful.']);
    
        // echo $response;
    
    }else{
       
        $response = json_encode(['status'=>'error','message'=>'Error Occured, Try Again!.']);
    
        echo $response;
    
    }


}else{

 $response = json_encode(['status'=>'error 200','message'=>'Please Complete All Fields .']);

 echo $response;

}

//  }else{
       
//     $response = json_encode(['status'=>'error','message'=>'Error Occured, Try Again!.']);

//     echo $response;
//     }

?>
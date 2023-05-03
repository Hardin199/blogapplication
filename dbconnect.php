<?php 

$name = "localhost";
$username = "root";
$password = ""; 
$dbname = "task4";

try {
    $connect = new PDO("mysql:host=$name;task4=$dbname", 
                    $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}
?>
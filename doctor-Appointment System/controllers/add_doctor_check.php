<?php
session_start();

if (isset($_POST['submit'])) {


$doctor_name=$_POST['name'];
$doctor_address=$_POST['address'];
$doctor_mobile=$_POST['mobile'];
$doctor_email=$_POST['email'];
$doctor_category=$_POST['doctor_category'];

$host = "localhost";
$user = "ari";
$password = "ari";
$database = "doctorapp";

// Establish a database connection
$conn = new mysqli($host, $user, $password, $database);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $query="INSERT INTO `Doctor` (`doctor_name`, `doctor_address`, `doctor_email`, `doctor_mobile_no`,`category`) 
    VALUES ( '$doctor_name', '$doctor_address', '$doctor_email', '$doctor_mobile','$doctor_category');";
    if(mysqli_query($conn,$query)){
        echo "<h1>$doctor_category</h1>";
    }
    else{
        echo "<h1>Not added</h1>";
    }
}








}
else{
    echo "<h1>kot</h1>";
}

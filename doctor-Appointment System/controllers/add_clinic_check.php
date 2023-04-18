<?php
session_start();

if (isset($_POST['submit'])) {


$clinic_name=$_POST['name'];
$clinic_address=$_POST['location'];
$clinic_mobile=$_POST['mobile'];
$clinic_email=$_POST['email'];

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
    $query="INSERT INTO `Clinic` (`clinic_name`, `location`, `email`, `mobile`) 
    VALUES ( '$clinic_name', '$clinic_address', '$clinic_email', '$clinic_mobile');";
    if(mysqli_query($conn,$query)){
        echo "Sussesful response";
    }
}

}
else{
    echo "<h1>kot</h1>";
}

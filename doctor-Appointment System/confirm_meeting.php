<?php
session_start();

session_start();
require "db_connection.php";
$conn=db_connection();
if(!$conn){
  die("Connection Error");
}

$doctor=$_SESSION['doctor'];
$date=$_SESSION['date'];
$category=$_SESSION['category'];
$doctor_id=$_SESSION['doctor_id'];
$time=$_POST['hour'];
$patient_id=$_SESSION['id'];
$query="INSERT INTO `Reservation` (`patient_id`, `doctor_id`, `clinic_id`, `reservation_date`, `reservation_time`)
         VALUES ('$patient_id', '$doctor_id', '1', '$date', '$time');";
  
 if(  mysqli_query($conn,$query)){
    echo "<h1>Db added successfly</h1>";
 }

 else{
    echo "<h1>Connection Failed</h1>";

 }



?>
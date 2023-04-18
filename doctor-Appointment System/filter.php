<?php
require 'patient_booking.php';
$host = "localhost";
            $user = "ari";
            $password = "ari";
            $database = "doctorapp";
            $conn = new mysqli($host, $user, $password, $database);

session_start();

if(isset($_POST['selectedOption'])) {
  $selectedOption = $_POST['selectedOption'];
  $_SESSION['category'] = $selectedOption;
  echo "String saved in session: " . $_SESSION['category'];
  displayDoctorOptions($conn);
}
?>



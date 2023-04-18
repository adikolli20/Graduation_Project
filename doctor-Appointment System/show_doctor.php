<?php
require "db_connection.php";
$conn=db_connection();
if(!$conn){
  die("Connection Error");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Profile</title>
  <link rel="stylesheet" href="show_doctor.css">
</head>
<body>
<ul class="allDoctors">
  <div class="container">
  <h1 id='header' class='header'> All the doctors</h1>

  </div> 
  <?php
  $sql="SELECT * FROM `Doctor` ";
  $result=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_assoc($result)){
    $name=$row['doctor_name'];
    $category=$row['category'];
    $email=$row['doctor_email'];
    $phone_nr=$row['doctor_mobile_no'];
    $address=$row['doctor_address'];
    echo " <li> ";
    echo " <div class='profile'> 
    <div class='avatar'>
    <img src='doctor.jpeg' alt='Profile Photo'>
    </div>
    <div class='info'>
    <h1>$name</h1>
    <h2>Specialised in $category</h2>
    <ul class='contact'>
      <li>Email: $email</li>
      <li>Phone: $phone_nr</li>
      <li>Location: $address </li>
    </ul>
  </div>
</div>

      </li>
    ";


  }
  ?>
       
     

    </ul>
  
  

</body>
</html>

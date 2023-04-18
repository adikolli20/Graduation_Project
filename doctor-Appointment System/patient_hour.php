<?php
session_start();
$doctor=$_POST['doctor'];
        $date=$_POST['date'];
        $category=$_POST['category'];
        $_SESSION['doctor']=$doctor;
        $_SESSION['date']=$date;
        $_SESSION['category']=$category;

          $host = "localhost";
            $user = "ari";
            $password = "ari";
            $database = "doctorapp";
            $conn = new mysqli($host, $user, $password, $database);
?>


<div class="center">
    <link rel="stylesheet" href="patient_hour.css">

<h1>Select the time for your appointment</h1>
  <form action='confirm_meeting.php' method='post'>
        <h2>Doctor you have selected is <?php echo "<h1>$doctor</h1>"?></h2>
        <h2>Date you have selected is <?php echo "<h1>$date</h1>"?></h2>
        <h2>This doctor is specialized in  <?php echo "<h1>$category</h1>"?></h2>

        <?php
        $doctor_id_selector="SELECT doctor_id FROM `Doctor` WHERE doctor_name='$doctor'";
        $doctor_query=mysqli_query($conn,$doctor_id_selector);
        $result=mysqli_fetch_array($doctor_query);
        $d_id=$result[0];
        $_SESSION['doctor_id']=$d_id;
        $hours_query="SELECT reservation_time FROM `Reservation` WHERE doctor_id=$d_id and reservation_date='$date'";
        $db_result=mysqli_query($conn,$hours_query);           

        $busy_hours=array();
        while ($row = mysqli_fetch_assoc($db_result)) {
            array_push($busy_hours, $row['reservation_time']);
        }
        $first=$busy_hours[0];
        $second=$busy_hours[1] ;
        ?>
        <h1>Please Select one of the free hours for reservation </h1>
        <select name="hour" id="hours_selected">
        <?php
        $starting_hour=9;
        while($starting_hour<16){
            $updated_hour=$starting_hour+1;
            $option="$starting_hour:00-$updated_hour:00";
            if( !in_array($option,$busy_hours)){
                echo "<option id='$starting_hour:00-$updated_hour:00' > $starting_hour:00-$updated_hour:00 </option>";
            }
            $starting_hour=$updated_hour;
        }
                ?>
        </select>
        <br><br>
        <button type='submit' name='submit'> Confirm Meeting</button>
  </form>
</div>
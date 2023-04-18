<?php
$_SESSION['category']="Dermatolog";
session_start();
require "db_connection.php";
$conn=db_connection();
if(!$conn){
  die("Connection Error");}
  $current_date = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"

?>


<!DOCTYPE html>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Educational registration form</title>
      <link rel="stylesheet" href="patient_booking.css"> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  </head>
  <body>
    <div class="main-block" name='changableContent'>
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Book a new Appointment</h1>
        <div class="btn-group">
        </div>
      </div>
      <form action="patient_hour.php" method='post' id='booking_form'>
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register your appointment here</h2>
        </div>
        <div class="info">
            <label for="category" default="None">Select the category </label>
          <select name="category" id="dropdown">
          <option value="" disabled selected hidden>-- Select Doctor Category --</option>

            <?php
          
            if($conn->connect_error){
              die("Connection failed: " . $conn->connect_error);}
              else {
                $query="SELECT Distinct category FROM `Doctor` ";
                $result=mysqli_query($conn,$query);
                  while ($category=mysqli_fetch_array($result)){
                  $value=$category['category'];
                  echo "<option value='$value'> $value </option>";
                
            }
              }
              
        
            ?>
          
          </select>
          <script>
            
              document.getElementById("dropdown").addEventListener("change", function() {
              // Get the selected option value
              var selectedOption = this.value;
              
            $.ajax({
          type: "POST",
          url: "filter.php",
          data: { selectedOption: selectedOption },
          success: function(response) {
  console.log(response);
  $("#doctor-dropdown").html(response);
}
});
  });

</script>
            
</script>
<label for="doctor">Select the Doctor </label>
            <select name="doctor" id="doctor-dropdown">
<?php
        function displayDoctorOptions($conn) {
          $selectedOption = $_SESSION['category'];
          $doctor_query= "SELECT doctor_name FROM `Doctor` WHERE category ='$selectedOption'";
          $doctor_result=mysqli_query($conn,$doctor_query);
          while ($doctor=mysqli_fetch_array($doctor_result)){
              $value=$doctor['doctor_name'];
              echo "<option value='$value'> $value </option>";
          }
      }
      displayDoctorOptions($conn);

?>         
</select>
            <label for="date">Select the date  </label>
            
            <input type="date" name="date" min="<?php echo $current_date; ?>">
        </div>
        <div class="checkbox">
        </div>
        <button type="submit" name='submit'>Submit</button>
      </form>
    </div>
  </body>
</html>
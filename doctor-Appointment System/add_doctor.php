
<?php 
session_start()
?>

<div class="login-box">
          <link rel="stylesheet" href="add_doctor.css"> 

  <h2>Add a new Doctor</h2>
  <form action="./controllers/add_doctor_check.php" method="post">
    <div class="user-box">
    <h3>Name</h3>

      <input type="text" name="name" required="">
      <h3>Address</h3>

      <input type="text" name="address" required="">

      <h3>Mobile No</h3>

      <input type="text" name="mobile" required="">

      <h3>Email</h3>

<input type="email" name="email" required="">

    <h3>Category</h3>

    <select class="select" name='doctor_category'>
  <option value="Cardo">Cardo </option>
  <option value="Heart Disease">Heart Disease </option>
  <option value="Bones">Bones </option>
  <option value="Dermatolog">Dermatolog</option>
</select>    
</div>
 
    <a>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button type="submit" name='submit'> Submit </button>
    </a>
  </form>
</div>


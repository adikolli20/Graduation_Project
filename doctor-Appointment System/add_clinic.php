
<?php
session_start()
?>

<html> 

<link rel="stylesheet" href="add_clinic.css"> 


<div class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image">	
			
		</div>
		<form class="card-form" method="post" action="./controllers/add_clinic_check.php">
        <label for="input-field" >Clinic Name</label>

			<div class="input">
				<input type="text" class="input-field" name='name' required/>
			</div>
            				<label class="input-field">Email</label>
						<div class="input">
				<input type="email" class="input-field" name='email' required/>
			</div>

            <label class="input-field">Location</label>
						<div class="input">
				<input type="text" class="input-field" name='location' required/>
			</div>



            <label class="input-field">Phone Nr</label>
						<div class="input">
				<input type="number" class="input-field" name='phone_nr' required/>
			</div>

			<div class="action">
				<button class="action-button" type="submit" name='submit'>Register Clinic</button>
			</div>
		</form>
		<div class="card-info">
		</div>
	</div>
</div>

</html>

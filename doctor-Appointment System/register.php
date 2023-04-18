<?php
session_start();
?>



<link rel="stylesheet" href="css/loginstyle.css">


<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action='controllers/register_check.php' method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
                    <h1>  <i> Patient Register  </i> </h1> <br> <br>
                    <label for="username"> Full Name</label>
					<input type="text" class="login__input" placeholder="Full name " name='name' required id='name'>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="email"> Email </label>

					<input type="email" class="login__input" placeholder="email" name='email' required id='email'>
				</div>

                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="phone"> Mobile No </label>

					<input type="number" class="login__input" placeholder="Mobile No" name='phone' required id='phone'>
				</div>
            
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="address"> Address </label>

					<input type="text" class="login__input" placeholder="Address" name='address' required id='address'>
				</div>
            
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="username"> Username </label>

					<input type="text" class="login__input" placeholder="Username" name='username' required id='username'>
				</div>
            
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="username"> Password </label>

					<input type="password" class="login__input" placeholder="Password" name='password' id='password'>
				</div>



				<button class="button login__submit" type="submit" name='submit'>
					<span class="button__text">Register</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>			
	
			</form>
			<div class="social-login">
				<h3></h3>
				
			</div>
                <h3 id="h3"> Do you have an account? <a href="login.php">  Log in Now </a></h3>

		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>





<?php


session_start();

if($_GET){
     $display=$_GET['registererror'];
     echo "<script>
     window.alert('$display');
         </script>";
 }
if(isset($_SESSION['username'])){
     $username=$_SESSION['username'];
     echo "<script>
     document.getElementById('username').value='$username';
     </script>";
}
if(isset($_SESSION['password'])){
     $password=$_SESSION['password'];
     echo "<script>
     document.getElementById('password').value='$password';
     </script>";
}

if(isset($_SESSION['email'])){
     $email=$_SESSION['email'];
     echo "<script>
     document.getElementById('email').value='$email';
     </script>";
}
if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
    echo "<script>
    document.getElementById('phone').value='$phone';
    </script>";
}
if(isset($_SESSION['address'])){
    $address=$_SESSION['address'];
    echo "<script>
    document.getElementById('address').value='$address';
    </script>";
}
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    echo "<script>
    document.getElementById('name').value='$name';
    </script>";
}


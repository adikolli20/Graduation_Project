
<?php
   session_start();

   require "db_connection.php";
   $conn=db_connection();
   if(!$conn){
     die("Connection Error");
   }


   if(isset($_POST['submit'])){

    $pattern = '/^(?=.*[A-Z]).{8,}$/';
    $num = '/^[0-9]{8,}$/';

   $username=htmlspecialchars($_POST['username']);
   $password=htmlspecialchars($_POST['password']);
   $email=htmlspecialchars($_POST['email'] );
   $phone=htmlspecialchars($_POST['phone'] );
   $address=htmlspecialchars($_POST['address']);
   $name=htmlspecialchars($_POST['name']);
   $_SESSION['username']="$username";
   $_SESSION['password']="$password";
   $_SESSION['phone']=$phone;
    $_SESSION['email']=$email;
    $_SESSION['name']=$name;
    $_SESSION['address']=$address;
    
     if(!preg_match($pattern, $password)){
    
    $error= "Password should have at least one uppercase letter and should be at least 8 characters";
    header("Location: http://localhost/code/doctor-Appointment%20System/register.php?registererror=".$error);
}
else if(!preg_match($num,$phone)){
    
   
    $error= "Phone should have at least 8 digits";
    header("Location: http://localhost/code/doctor-Appointment%20System/register.php?registererror=".$error);
}
else if ($username=="admin"){
    $error="Admin is not a valid username";
    header("Location: http://localhost/code/doctor-Appointment%20System/register.php?registererror=".$error);
}
    else {
    


    if(!$conn){
        echo "DB not connected";
    }
    else{
        $encryptedpassword= md5($password);
        $sql= "SELECT * from `Patient` where username='$username';";
        $result= mysqli_query($conn,$sql);
        $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if(sizeof($infos)>0){
                $error="User Already Exists. Try another username";
                header("Location: http://localhost/code/doctor-Appointment%20System/register.php?registererror=".$error);
            }
           
            else{


        $sql = "INSERT INTO `Patient` (`patient_name`, `patient_mobile_No`, `patient_address`, `patient_email`, `username`, `password`)
         VALUES ( '$name', '$phone', '$address', '$email', '$username', '$password');";
      
        if(mysqli_query($conn,$sql)){
            $newsql="SELECT id,username from `Patient` where username='$username';";
            $result= mysqli_query($conn,$newsql);
            $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $_SESSION['id']=$infos[0]['id'];
            header("Location: #");
        }
        else{
            $error= "An error occured .Please try again";
            header("Location: http://localhost/code/doctor-Appointment%20System/register.php?registererror=".$error);
        }
    }   
}      
}  
}
   ?> 


<?php
       
?>

































   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
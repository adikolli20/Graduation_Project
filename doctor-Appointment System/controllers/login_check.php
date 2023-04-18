<?php 
        session_start();
        require "db_connection.php";
        $conn=db_connection();
        if(!$conn){
          die("Connection Error");
        }
        

if(isset($_POST['submit'])){
   
    $username= $_POST['username'];
    $password= $_POST['password'];
    $_SESSION['usernameCheck']=$username;
    $_SESSION['passwordCheck']=$password;
    if  ($username=="" or $username==null or $password=="" or $password==null){
        $error="Please fill all fields";
        header("Location: http://localhost/code/doctor-Appointment%20System/login.php?logincheck=".$error);
    }
   
    else{

        if(!$conn){
            echo "Error Occured";
        }
        else{
            $sql= "SELECT * from `Patient` where username='$username';";
            $result= mysqli_query($conn,$sql);
            $infos = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if(sizeof($infos)==0){
                $error="Wrong username or password";
                header("Location: http://localhost/code/doctor-Appointment%20System/login.php?logincheck=".$error);
                }
            else {
                for($i=0;$i<sizeof($infos);$i=$i+1){
                    if($password == $infos[$i]['password'] && $username==$infos[$i]['username']){
                        $_SESSION['email']=$infos[$i]['patient_email'];
                        $_SESSION['password']=$password;
                        $_SESSION['phone']=$infos[$i]['patient_mobile_No'];
                        $_SESSION['username']=$infos[$i]['username'];
                        $_SESSION['id']=$infos[$i]['patient_id'];
                        $_SESSION['name']=$infos[$i]['patient_name'];
                        $_SESSION['address']=$infos[$i]['patient_address'];

                        if($username=="admin"){
                            header("Location: http://localhost/code/doctor-Appointment%20System/login.php");
                        }
                        else {
                            $id=$_SESSION['id'];
                            header("Location: http://localhost/code/doctor-Appointment%20System/patient_booking.php");

                        
                        }
                      
                        exit;
                    }
                    else{
                        $error="Wrong username or password";
                        header("Location: http://localhost/code/doctor-Appointment%20System/login.php?logincheck=".$error);
                    }
        
                }
               
            }
          


        }

        
    }
}
else{
    header("Location:login.php");
}




?>
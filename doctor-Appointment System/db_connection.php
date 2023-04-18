<?php
function db_connection(){
    $host = "localhost";
    $user = "ari";
    $password = "ari";
    $database = "doctorapp";
    
    // Establish a database connection
    $conn = new mysqli($host, $user, $password, $database);    
    return $conn;    
}



?>
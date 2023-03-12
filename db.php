<?php

    $host = "localhost";
    $user = "jeldel";
    $pass = "jeldel";
    $db = "restoran";
    
    $conn = new mysqli($host, $user, $pass, $db);
    

    if(!$conn)
    {
        die(mysqli_error($conn));  
    }
    
?>
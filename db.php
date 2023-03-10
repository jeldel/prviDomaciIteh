<?php

    $host = "localhost";
    $user = "jeldel";
    $pass = "jeldel";
    $db = "prvi_domaci_iteh";
    
    $conn = new mysqli($host, $user, $pass, $db);
    

    if(!$conn)
    {
        die(mysqli_error($conn));  
    }
    
?>
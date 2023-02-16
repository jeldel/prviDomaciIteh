<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "prvi_domaci_iteh";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if(!$conn)
    {
        die(mysqli_error($conn));  
    }

// Koristimo negaciju da nam se ne bi na svakom prozoru gde smo includeovali db pojavljivalo da je uspesna konekcija

?>
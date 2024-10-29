<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'school';


    $conn = new mysqli($serverName, $userName, $password, $database);

    if($conn->connect_error){
        die("There was an error with the connection: ". $conn->connect_error);
    }
    
?>
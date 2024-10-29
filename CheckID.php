<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $id = $_POST['ID'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root"; 
    $db_password = ""; 
    $dbname = "school";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT ID, password FROM login WHERE Name = ? and role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $role); 
    $stmt->execute(); 

    // if ($stmt->num_rows > 0) {
        $stmt->bind_result($ID , $Correct_password);
        $stmt->fetch(); 

        if ($password === $Correct_password) {

            $_SESSION['ID'] = $ID;
            $_SESSION['Name'] = $name;

            if($role === 'Student')
                header("Location: Admin/Student/index.php");

            if($role === 'Teacher')
                header("Location: Admin/Teacher/index.php");
                echo "Name " . $_SESSION['Name'];

            if($role === 'Admin')
                header("Location: Admin/adminMain.php");

        } else {
            echo "Invalid password. Correct password is: ";
            echo $Correct_password;
        }
    } else {
        echo "Invalid Name or Role.";
    }

    $stmt->close();
    $conn->close();
?>
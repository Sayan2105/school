<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $Name = $_POST['Name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $cpassword = $_POST['CPassword']; // Confirm password

    // Check if passwords match
    if ($password === $cpassword) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Database connection
        include('databaseConn.php');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL insert query
        $query = "INSERT INTO login (Name, role, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $Name, $role, $password);
         
        // Execute and check for errors
        if ($stmt->execute()) {
            if($role === 'Teacher'){
                header("Location: SignupTeacher.php ");

            }else if($role === 'Student'){
                header("Location: Admin/Student/register.php");
            }else{
                echo "Registered new Admin!";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Passwords do not match.";
    }
}
?>

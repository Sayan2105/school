<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $subject = $_POST['Subject'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $salary = $_POST['Salary'];
    $address = $_POST['Address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['CPassword'];

    if ($password === $confirmPassword) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "school";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Enable MySQLi to throw exceptions for error handling
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            // Start a transaction
            $conn->begin_transaction();

            // Prepare the SQL statement for the teacher_basicInfo table
            $sql = "INSERT INTO teacher_basicInfo (Name, Age, Gender, Subject, Email, Phone, Salary, Address, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissssiss", $name, $age, $gender, $subject, $email, $phone, $salary, $address, $password);

            // Prepare and bind for the login table
            $query_login = "INSERT INTO login (Name, Role, Password) VALUES (?, ?, ?)";
            $stmt_login = $conn->prepare($query_login);
            $role = "Teacher"; // Set role as "Teacher"
            $stmt_login->bind_param("sss", $name, $role, $password);

            // Execute both statements
            if ($stmt->execute() && $stmt_login->execute()) {
                
                $conn->commit();
                echo "Teacher information saved successfully!";
            }

        } catch (mysqli_sql_exception $e) {
            $conn->rollback();

            // Check if the error is a duplicate entry
            if ($e->getCode() == 1062) { // 1062 is the error code for duplicate entry
                echo "Name already exists.";
            } else {
                // Print other error messages
                echo "An error occurred: " . $e->getMessage();
            }
        }

        // Close the statements and connection
        $stmt->close();
        $stmt_login->close();
        $conn->close();

    } else {
        echo "Passwords do not match.";
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Class = $_POST['Class'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $user_password = $_POST['password'];
    $confirmPassword = $_POST['CPassword'];

    if ($user_password === $confirmPassword) {
        // Database connection
        include('databaseConn.php');

        // Enable MySQLi to throw exceptions for error handling
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            // Start a transaction
            $conn->begin_transaction();

            // Prepare the SQL statement for the students table
            $sql = "INSERT INTO students (first_name, last_name, class_id, email, phone, Password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssisis", $FName, $LName, $Class, $Email, $Phone, $user_password);

            // Prepare and bind for the login table
            $query_login = "INSERT INTO login (Name, Role, Password) VALUES (?, ?, ?)";
            $stmt_login = $conn->prepare($query_login);
            $role = "Student"; // Set role as "Student"
            $stmt_login->bind_param("sss", $FName, $role, $user_password);

            // Execute both statements
            if ($stmt->execute() && $stmt_login->execute()) {
                $conn->commit();
                echo "Student information saved successfully!";
            } else {
                die("There was an error.");
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

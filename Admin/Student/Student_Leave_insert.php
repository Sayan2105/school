<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['teacher_id']; 
    $first_name = $_POST['first_name'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $Reason = $_POST['reason'];

    // Prepare an SQL statement to insert the leave request
    $insertQuery = "INSERT INTO student_leave (StudentID, Student_Name, From_Date, To_Date, Reason) VALUES (?, ?, ?, ?, ?)"; // Change here
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("issss", $student_id, $first_name, $fromDate, $toDate, $Reason);
    
    if ($insertStmt->execute()) {
        // Redirect back to the dashboard with a success message
        echo "Successfully Sumbitted Go Back.";
        exit();
    } else {
        // Handle error
        echo "Error: " . $insertStmt->error;
    }
}
?>

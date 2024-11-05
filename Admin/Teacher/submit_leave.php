<?php
session_start();
include('../database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST['teacher_id']; 
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $reason = $_POST['reason'];

    // Prepare an SQL statement to insert the leave request
    $insertQuery = "INSERT INTO leaveapplications (teacher_id, start_date, end_date, reason, status) VALUES (?, ?, ?, ?, 'Pending')"; // Change here
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("isss", $teacher_id, $fromDate, $toDate, $reason);
    
    if ($insertStmt->execute()) {
        // Redirect back to the dashboard with a success message
        header("Location: index.php?message=Leave request submitted successfully.");
        exit();
    } else {
        // Handle error
        echo "Error: " . $insertStmt->error;
    }
}
?>

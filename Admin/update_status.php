<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    $new_status = $_POST['status'];

    // Update the leave request status
    $updateQuery = "UPDATE leaveapplications SET status = ? WHERE teacher_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $new_status, $request_id);

    if ($stmt->execute()) {
        // Redirect back to admin requests page
        header("Location: Teacher-leave-status.php");
        exit();
    } else {
        echo "Error updating status: " . $stmt->error;
    }
}
?>

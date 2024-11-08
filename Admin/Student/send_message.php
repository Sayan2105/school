<?php
// Database connection
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_id = $_POST['student_id'];
    $sender_name = $_POST['student_name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO student_messages (StudentID, Student_Name, Body) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $sender_id, $sender_name, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<?php
// Database connection
include('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_id = $_POST['teacher_id'];
    $sender_name = $_POST['teacher_name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO teacher_admin_messages (teacher_id, teacher_Name, message) VALUES (?, ?, ?)";
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

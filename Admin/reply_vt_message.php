<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];

    $sql = "UPDATE teacher_admin_messages SET reply = ?, status = 'replied', replied_at = CURRENT_TIMESTAMP WHERE message_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $reply, $message_id);

    if ($stmt->execute()) {
        echo "Reply sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

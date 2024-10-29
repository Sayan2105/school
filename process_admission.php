<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];
    $dob = $_POST['dob'];
    $message = $_POST['message'];

    include('databaseConn.php');
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `admission` (`Name`, `Email`, `Grade`, `DOB`, `AdditionalMessage`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $grade, $dob, $message);

    // Execute the statement
    if ($stmt->execute()) {
        $successMessage = "Your application has been submited successfully!";
    } else {
        $errorMessage = "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
    
    // Redirect back to the form with a success or error message
    header("Location: admission.php?success=" . urlencode($successMessage));
    exit();
}

// Redirect back to the form if accessed directly
header("Location: admission.php");
exit();
?>

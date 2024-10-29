<?php

// To send the email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Use this if you installed via Composer

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data and sanitize it
    $name = htmlspecialchars($_POST['name']);  
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Connect to database (update the credentials)
    $conn = new mysqli("localhost", "root", "", "school");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `messages` (`Name`, `Email`, `Subject`, `Body`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement and check for success
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    // Close database connection
    $stmt->close();
    $conn->close();

    // sending the email
    try {
        // Server settings
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'sayannandi.2105@gmail.com'; 
        $mail->Password   = 'vbhy vmdq bykz fhii'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587; 

        // Recipients
        $mail->setFrom('sayannandi.2105@gmail.com', 'Sayan');
        $mail->addAddress('sayannandi.2105@gmail.com', $name); 
        $mail->addReplyTo('sayannandi.2105@gmail.com', 'Sayan'); 

        // Content
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body    = nl2br("Message from: $name\nEmail: $email\n\nMessage:\n$message");
        $mail->AltBody = "Message from: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
        } else {
            echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Redirect back to the contact page if accessed directly
    header("Location: Contact.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Display - The School</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

 <!-- Nav Start -->
 <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">The School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php" target = "_blank">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="KnowMore.php" target = "_blank">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="Admission.php" target = "_blank">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="AdminMessages.php">Admin messages</a></li>
                    <li class="nav-item"><a class="nav-link" href="Gallery.php">Gallery</a></li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-light me-2" onclick = "window.open('Login.php')">Login</button>
                    <button type="button" class="btn btn-warning" onclick= "window.open('Admission.php')" >Get your Admission</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container mt-5 my-3"> <!-- If mail is sent successfully. -->
        <h1>Your Message has been sent.</h1>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Subject:</strong> <?php echo htmlspecialchars($subject); ?></p>
        <p><strong>Message:</strong><br><?php echo nl2br(htmlspecialchars($message)); ?></p>
        <p class="text-success"><strong>Database Entry Successfully Completed.</strong></p>

        <a href="Contact.php" class="btn btn-primary">Go Back</a>
    </div>

    <!-- Footer Start -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024 The School. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

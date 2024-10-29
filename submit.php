<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Initialize the variables
    $sname = $_POST['sname'];
    $class = $_POST['class'];
    $age = $_POST['age'];

    // Connect to database (update the credentials)
    $conn = new mysqli("localhost", "root", "", "school");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `students` (`sname`, `class`, `age`) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $sname, $class, $age);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull</title>
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

<div class="container mt-5 text-center">
    <h2 class="text-center mt-5">Registration Successfully Done</h2>
    <button type = "button" class="btn btn-primary mt-4 px-3" onclick = "window.open('index.php')"> Go back</button>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


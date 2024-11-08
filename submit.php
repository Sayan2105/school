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

<?php include('navbar.php'); ?>

<div class="container mt-5 text-center">
    <h2 class="text-center mt-5">Registration Successfully Done</h2>
    <button type = "button" class="btn btn-primary mt-4 px-3" onclick = "window.open('index.php')"> Go back</button>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


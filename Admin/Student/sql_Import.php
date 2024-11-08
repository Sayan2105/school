<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statements to import
$sql = "
CREATE TABLE Teacher_TimeTable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    class_id INT NOT NULL,
    class_name VARCHAR(100),
    schedule DATETIME,
    room_number VARCHAR(10),
    FOREIGN KEY (teacher_id) REFERENCES teacher_basicinfo(ID)
);

";

// Execute multi query
if ($conn->multi_query($sql)) {
    echo "SQL imported successfully.";
} else {
    echo "Error importing SQL: " . $conn->error;
}

// Close connection
$conn->close();
?>

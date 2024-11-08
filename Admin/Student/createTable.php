<?php
// setup_database.php

// Database connection details
$host = "localhost"; // Change this if your database host is different
$dbname = "school"; // Change this to your desired database name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database if it doesn't exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    echo "Database created successfully.<br>";

    // Use the newly created database
    $conn->exec("USE $dbname");

    // SQL queries to create tables
    $sql = "
    CREATE TABLE IF NOT EXISTS teacher_basicinfo (
        teacher_id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        email VARCHAR(100),
        phone VARCHAR(15),
        subject_specialization VARCHAR(100),
        hire_date DATE,
        salary DECIMAL(10, 2),
        status ENUM('active', 'inactive')
    );

    CREATE TABLE IF NOT EXISTS Classes (
        class_id INT PRIMARY KEY AUTO_INCREMENT,
        class_name VARCHAR(50),
        teacher_id INT,
        schedule VARCHAR(255),
        room_number VARCHAR(10),
        FOREIGN KEY (teacher_id) REFERENCES teacher_basicinfo(ID) ON DELETE SET NULL
    );

    CREATE TABLE IF NOT EXISTS Students (
        student_id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        class_id INT,
        email VARCHAR(100),
        phone VARCHAR(15),
        FOREIGN KEY (class_id) REFERENCES Classes(class_id) ON DELETE SET NULL
    );

    CREATE TABLE IF NOT EXISTS Attendance (
        attendance_id INT PRIMARY KEY AUTO_INCREMENT,
        class_id INT,
        date DATE,
        student_id INT,
        status ENUM('present', 'absent'),
        FOREIGN KEY (class_id) REFERENCES Classes(class_id) ON DELETE CASCADE,
        FOREIGN KEY (student_id) REFERENCES Students(student_id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS Grades (
        grade_id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT,
        class_id INT,
        assignment_name VARCHAR(100),
        grade DECIMAL(5, 2),
        date_assigned DATE,
        FOREIGN KEY (student_id) REFERENCES Students(student_id) ON DELETE CASCADE,
        FOREIGN KEY (class_id) REFERENCES Classes(class_id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS Assignments (
        assignment_id INT PRIMARY KEY AUTO_INCREMENT,
        class_id INT,
        assignment_name VARCHAR(100),
        due_date DATE,
        description TEXT,
        FOREIGN KEY (class_id) REFERENCES Classes(class_id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS LeaveApplications (
        leave_id INT PRIMARY KEY AUTO_INCREMENT,
        teacher_id INT,
        start_date DATE,
        end_date DATE,
        reason TEXT,
        status ENUM('pending', 'approved', 'rejected'),
        FOREIGN KEY (teacher_id) REFERENCES Teachers(teacher_id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS Messages (
        message_id INT PRIMARY KEY AUTO_INCREMENT,
        sender_id INT,
        receiver_id INT,
        message_content TEXT,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ";

    // Execute each table creation statement
    $conn->exec($sql);
    echo "Tables created successfully.<br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>

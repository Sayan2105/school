<?php
// Database connection details
$host = "localhost"; // Change if necessary
$dbname = "school"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary

try {
    // Establish a database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Array of teacher IDs to use in the timetable
    $teacher_ids = [1, 2, 4, 5, 7, 8, 9, 17, 22];

    // Sample timetable data for each teacher
    $data = [
        ['class_id' => 1, 'class_name' => 'Mathematics', 'schedule' => '2024-11-06 08:00:00', 'room_number' => 'A101'],
        ['class_id' => 2, 'class_name' => 'Science', 'schedule' => '2024-11-06 10:00:00', 'room_number' => 'B201'],
        ['class_id' => 3, 'class_name' => 'History', 'schedule' => '2024-11-06 12:00:00', 'room_number' => 'C301'],
        ['class_id' => 4, 'class_name' => 'English', 'schedule' => '2024-11-07 09:00:00', 'room_number' => 'D101'],
        ['class_id' => 5, 'class_name' => 'Chemistry', 'schedule' => '2024-11-07 11:00:00', 'room_number' => 'E202'],
        ['class_id' => 6, 'class_name' => 'Physics', 'schedule' => '2024-11-08 14:00:00', 'room_number' => 'F303'],
        ['class_id' => 7, 'class_name' => 'Geography', 'schedule' => '2024-11-08 16:00:00', 'room_number' => 'G404'],
        ['class_id' => 8, 'class_name' => 'Biology', 'schedule' => '2024-11-09 10:00:00', 'room_number' => 'H105'],
        ['class_id' => 9, 'class_name' => 'Computer Science', 'schedule' => '2024-11-09 12:00:00', 'room_number' => 'I206'],
    ];

    // Prepare the SQL statement for insertion
    $sql = "INSERT INTO teacher_timetable (teacher_id, class_id, class_name, schedule, room_number) 
            VALUES (:teacher_id, :class_id, :class_name, :schedule, :room_number)";
    $stmt = $conn->prepare($sql);

    // Insert data for each teacher in the specified list
    foreach ($teacher_ids as $index => $teacher_id) {
        // Use data from the $data array based on the index (looping if necessary)
        $entry = $data[$index % count($data)];
        
        // Execute the prepared statement with the data
        $stmt->execute([
            ':teacher_id' => $teacher_id,
            ':class_id' => $entry['class_id'],
            ':class_name' => $entry['class_name'],
            ':schedule' => $entry['schedule'],
            ':room_number' => $entry['room_number'],
        ]);

        echo "Inserted timetable entry for Teacher ID: $teacher_id, Class: {$entry['class_name']}\n";
    }

    echo "Data inserted successfully!";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

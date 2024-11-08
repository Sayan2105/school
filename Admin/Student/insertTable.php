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
        ['class_id' => 101, 'class_name' => 'Mathematics', 'schedule' => '08:00:00', 'room_number' => 'A101', 'day' => 'Monday'],
        ['class_id' => 102, 'class_name' => 'Science', 'schedule' => '10:00:00', 'room_number' => 'B201', 'day' => 'Tuesday'],
        ['class_id' => 103, 'class_name' => 'History', 'schedule' => '12:00:00', 'room_number' => 'C301', 'day' => 'Wednesday'],
        ['class_id' => 104, 'class_name' => 'English', 'schedule' => '09:00:00', 'room_number' => 'D101', 'day' => 'Thursday'],
        ['class_id' => 105, 'class_name' => 'Chemistry', 'schedule' => '11:00:00', 'room_number' => 'E202', 'day' => 'Friday'],
        ['class_id' => 106, 'class_name' => 'Physics', 'schedule' => '14:00:00', 'room_number' => 'F303', 'day' => 'Saturday'],
        ['class_id' => 107, 'class_name' => 'Geography', 'schedule' => '16:00:00', 'room_number' => 'G404', 'day' => 'Monday'],
        ['class_id' => 108, 'class_name' => 'Biology', 'schedule' => '10:00:00', 'room_number' => 'H105', 'day' => 'Wednesday'],
        ['class_id' => 109, 'class_name' => 'Computer Science', 'schedule' => '12:00:00', 'room_number' => 'I206', 'day' => 'Friday'],
    ];

    // Prepare the SQL statement for insertion
    $sql = "INSERT INTO teacher_timetable (teacher_id, class_id, class_name, schedule, room_number, day) 
            VALUES (:teacher_id, :class_id, :class_name, :schedule, :room_number, :day)";
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
            ':day' => $entry['day'],
        ]);

        echo "Inserted timetable entry for Teacher ID: $teacher_id, Class: {$entry['class_name']}, Day: {$entry['day']}\n";
    }

    echo "Data inserted successfully!";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

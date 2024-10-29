<?php
// insert_data.php

// Database connection details
$host = "localhost"; // Change this if your database host is different
$dbname = "school"; // Change this to your desired database name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data into Teachers table
    // $teachers = [
    //     ['John', 'Doe', 'john.doe@example.com', '1234567890', 'Mathematics', '2020-01-15', 50000, 'active'],
    //     ['Jane', 'Smith', 'jane.smith@example.com', '0987654321', 'Science', '2019-02-20', 52000, 'active'],
    //     ['Alice', 'Johnson', 'alice.johnson@example.com', '1122334455', 'English', '2021-03-25', 48000, 'inactive'],
    //     ['Robert', 'Brown', 'robert.brown@example.com', '2233445566', 'History', '2018-05-10', 55000, 'active'],
    //     ['Maria', 'Garcia', 'maria.garcia@example.com', '3344556677', 'Chemistry', '2022-09-30', 53000, 'active'],
    //     ['Chris', 'Wilson', 'chris.wilson@example.com', '4455667788', 'Biology', '2020-11-20', 49000, 'active'],
    //     ['Emily', 'Davis', 'emily.davis@example.com', '5566778899', 'Physics', '2021-12-01', 51000, 'inactive'],
    // ];

    // $teacherStmt = $conn->prepare("INSERT INTO Teachers (first_name, last_name, email, phone, subject_specialization, hire_date, salary, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // foreach ($teachers as $teacher) {
    //     $teacherStmt->execute($teacher);
    // }

    // echo "Data inserted into Teachers table successfully.<br>";

    // Insert data into Classes table
    // $classes = [
    //     ['Math 101', 1, 'Mon-Wed-Fri 10:00-11:00', 'Room 101'],
    //     ['Science 101', 2, 'Tue-Thu 11:00-12:00', 'Room 102'],
    //     ['English 101', 4, 'Mon-Wed 12:00-1:00', 'Room 103'],
    //     ['History 101', 5, 'Tue-Thu 1:00-2:00', 'Room 104'],
    //     ['Chemistry 101', 7, 'Mon-Wed 2:00-3:00', 'Room 105'],
    //     ['Biology 101', 8, 'Fri 9:00-10:00', 'Room 106'],
    //     ['Physics 101', 9, 'Mon-Fri 3:00-4:00', 'Room 107'],
    //     ['Math 201', 17, 'Mon-Wed-Fri 9:00-10:00', 'Room 201']
    // ];

    // $classStmt = $conn->prepare("INSERT INTO Classes (class_name, teacher_id, schedule, room_number) VALUES (?, ?, ?, ?)");

    // foreach ($classes as $class) {
    //     $classStmt->execute($class);
    // }

    // echo "Data inserted into Classes table successfully.<br>";

    // Insert data into Students table
    // $students = [
    //     ['Michael', 'Brown', 1, 'michael.brown@example.com', '1231231234'],
    //     ['Emily', 'Davis', 1, 'emily.davis@example.com', '2342342345'],
    //     ['Chris', 'Wilson', 2, 'chris.wilson@example.com', '3453453456'],
    //     ['Jessica', 'Taylor', 3, 'jessica.taylor@example.com', '4564564567'],
    //     ['David', 'Moore', 2, 'david.moore@example.com', '5675675678'],
    //     ['Sarah', 'Anderson', 1, 'sarah.anderson@example.com', '6786786789'],
    //     ['Robert', 'Thomas', 3, 'robert.thomas@example.com', '7897897890'],
    //     ['Emma', 'Martin', 4, 'emma.martin@example.com', '8908908901']
    // ];

    // $studentStmt = $conn->prepare("INSERT INTO Students (first_name, last_name, class_id, email, phone) VALUES (?, ?, ?, ?, ?)");

    // foreach ($students as $student) {
    //     $studentStmt->execute($student);
    // }

    // echo "Data inserted into Students table successfully.<br>";

    // // Insert data into Attendance table
    // $attendances = [
    //     [1, '2024-10-01', 1, 'present'],
    //     [1, '2024-10-01', 2, 'absent'],
    //     [2, '2024-10-01', 3, 'present'],
    //     [2, '2024-10-01', 4, 'present'],
    //     [1, '2024-10-02', 1, 'present'],
    //     [1, '2024-10-02', 2, 'present'],
    //     [2, '2024-10-02', 3, 'absent'],
    //     [2, '2024-10-02', 4, 'present'],
    //     [3, '2024-10-01', 5, 'present'],
    //     [3, '2024-10-01', 6, 'present'],
    //     [3, '2024-10-02', 5, 'present'],
    //     [3, '2024-10-02', 6, 'absent'],
    // ];

    // $attendanceStmt = $conn->prepare("INSERT INTO Attendance (class_id, date, student_id, status) VALUES (?, ?, ?, ?)");

    // foreach ($attendances as $attendance) {
    //     $attendanceStmt->execute($attendance);
    // }

    // echo "Data inserted into Attendance table successfully.<br>";

    // // Insert data into Grades table
    // $grades = [
    //     [1, 1, 'Assignment 1', 95.00, '2024-10-01'],
    //     [1, 1, 'Assignment 2', 88.50, '2024-10-08'],
    //     [2, 1, 'Assignment 1', 72.00, '2024-10-01'],
    //     [3, 1, 'Quiz 1', 85.00, '2024-10-05'],
    //     [4, 2, 'Project 1', 90.00, '2024-10-10'],
    //     [5, 2, 'Quiz 2', 78.00, '2024-10-05'],
    //     [6, 3, 'Midterm Exam', 89.50, '2024-10-15'],
    //     [7, 3, 'Final Exam', 92.00, '2024-10-22']
    // ];

    // $gradeStmt = $conn->prepare("INSERT INTO Grades (student_id, class_id, assignment_name, grade, date_assigned) VALUES (?, ?, ?, ?, ?)");

    // foreach ($grades as $grade) {
    //     $gradeStmt->execute($grade);
    // }

    // echo "Data inserted into Grades table successfully.<br>";

    // // Insert data into Assignments table
    // $assignments = [
    //     [1, 'Math Homework', '2024-10-10', 'Solve problems 1 to 10 from the textbook.'],
    //     [2, 'Science Project', '2024-10-15', 'Create a model of the solar system.'],
    //     [1, 'Math Quiz', '2024-10-12', 'Prepare for the quiz on chapter 1.'],
    //     [2, 'Biology Lab', '2024-10-20', 'Complete the lab report on photosynthesis.'],
    //     [3, 'History Essay', '2024-10-25', 'Write an essay on World War II.']
    // ];

    // $assignmentStmt = $conn->prepare("INSERT INTO Assignments (class_id, assignment_name, due_date, description) VALUES (?, ?, ?, ?)");

    // foreach ($assignments as $assignment) {
    //     $assignmentStmt->execute($assignment);
    // }

    // echo "Data inserted into Assignments table successfully.<br>";

    // Insert data into LeaveApplications table
    $leaveApplications = [
        [1, '2024-11-01', '2024-11-05', 'Personal reasons', 'pending'],
        [2, '2024-11-10', '2024-11-12', 'Medical leave', 'approved'],
        [5, '2024-12-01', '2024-12-10', 'Family emergency', 'rejected'],
        [4, '2024-12-15', '2024-12-18', 'Vacation', 'pending'],
        [9, '2024-11-20', '2024-11-22', 'Sick leave', 'approved']
    ];

    $leaveStmt = $conn->prepare("INSERT INTO LeaveApplications (teacher_id, start_date, end_date, reason, status) VALUES (?, ?, ?, ?, ?)");

    foreach ($leaveApplications as $leave) {
        $leaveStmt->execute($leave);
    }

    echo "Data inserted into LeaveApplications table successfully.<br>";

    // Close the database connection
    $conn = null;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

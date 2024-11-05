<?php
session_start();
include('../database.php');

if (!isset($_SESSION['ID']))
    header("Location: ../Admin");

$name = $_SESSION['Name'];

// First query to get teacher information
$teacherQuery = "SELECT * FROM teacher_basicInfo WHERE Name = ?";
$teacherStmt = $conn->prepare($teacherQuery);
$teacherStmt->bind_param("s", $name);
$teacherStmt->execute();
$teacherResult = $teacherStmt->get_result();
$teacherInfo = $teacherResult->fetch_assoc();

// Second query to get timetable information
$timetableQuery = "SELECT tt.*, tbi.name AS teacherName 
                   FROM teacher_timetable AS tt 
                   INNER JOIN teacher_basicInfo AS tbi 
                   ON tt.teacher_id = tbi.ID
                   WHERE tbi.name = ?";
$timetableStmt = $conn->prepare($timetableQuery);
$timetableStmt->bind_param("s", $name);
$timetableStmt->execute();
$timetableResult = $timetableStmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | Time Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-center">Dashboard Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Class Management</a></li>
                <!-- Add other menu items -->
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo htmlspecialchars($teacherInfo['Name']); ?>!</h2>
                <p>Your Time Table is here</p>
            </div>

            <!-- Hero Section -->
            <div class="hero">
                <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image">
                <div class="hero-details">
                    <?php if ($teacherInfo) { ?>
                        <h5>Name: <?php echo htmlspecialchars($teacherInfo['Name']); ?></h5>
                        <p>Age: <?php echo htmlspecialchars($teacherInfo['Age']); ?></p>
                        <p>Gender: <?php echo htmlspecialchars($teacherInfo['Gender']); ?></p>
                        <p>Subject: <?php echo htmlspecialchars($teacherInfo['Subject']); ?></p>
                        <p>Email: <?php echo htmlspecialchars($teacherInfo['Email']); ?></p>
                        <p>Phone: <?php echo htmlspecialchars($teacherInfo['Phone']); ?></p>
                        <p>Address: <?php echo htmlspecialchars($teacherInfo['Address']); ?></p>
                    <?php } else { ?>
                        <p>No information found for this teacher. Name: <?php echo htmlspecialchars($name); ?></p>
                    <?php } ?>
                </div>
            </div>

            <!-- Timetable Section -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card white">
                                <div class="card-header">
                                    <h3 class="card-title">Teacher Name and Timetable</h3>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" style = "color: white;" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Teacher ID</th>
                                                <th>Teacher Name</th>
                                                <th>Class ID</th>
                                                <th>Class Name</th>
                                                <th>Day</th>
                                                <th>Schedule</th>
                                                <th>Room Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $timetableResult->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['teacher_id']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['teacherName']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['class_id']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['class_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['day']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['schedule']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['room_number']); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

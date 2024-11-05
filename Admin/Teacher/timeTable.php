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
$row = $teacherResult->fetch_assoc();

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
        <?php
            include('sidebar.php');
        ?>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo htmlspecialchars($row['Name']); ?>!</h2>
                <p>Your Time Table is here</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('Hero.php');
            ?>

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

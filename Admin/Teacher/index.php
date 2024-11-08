<?php
    session_start();
    include('../database.php');

    if(!isset($_SESSION['ID']))
        header("Location: ../Admin");

    $name = $_SESSION['Name'];

    $query = "SELECT * from `teacher_basicInfo` where name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="Teacherstyle.css"> -->
    <?php include('includeHeader.php'); ?>
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
                <h2>Welcome, <?php echo $row['Name'] ?> !</h2>
                <p>This is your main.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('Hero.php');
            ?>

            <div class="row g-3">
                <!-- Class Management Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Time Table</h5>
                            <p class="card-text">Manage schedules, attendance, and student rosters.</p>
                            <a href="timeTable.php" class="btn btn-info">Go to Class Management</a>
                        </div>
                    </div>
                </div>

                <!-- Student Performance Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Student Performance</h5>
                            <p class="card-text">View grades, assignments, and progress reports.</p>
                            <a href="../admin_Students.php" target="_blank" class="btn btn-info">View Performance</a>
                        </div>
                    </div>
                </div>

                <!-- Salary Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Salary</h5>
                            <p class="card-text">Know your Salary.</p>
                            <a href="teacher_salary.php" class="btn btn-info">Go to Salary page</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-3">
                <!-- Calendar Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Calendar</h5>
                            <p class="card-text">See this months calendar</p>
                            <a href="../Disp-calendar.php" class="btn btn-info">Go to Calendar.</a>
                        </div>
                    </div>
                </div>

                <!-- Leave Application -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Leave Application</h5>
                            <p class="card-text">Do you want to take a leave?</p>
                            <a href="Teacher-Leave.php" class="btn btn-info">Request Leave</a>
                        </div>
                    </div>
                </div>

                <!-- Messages Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Messages</h5>
                            <p class="card-text">Communicate with the Admin.</p>
                            <a href="Teacher-Msg-Admin.php" class="btn btn-info">Go to Messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

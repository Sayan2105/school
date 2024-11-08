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
    <title>Teacher Dashboard | Leave</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> -->
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
                <p>Get all your leave information here.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('Hero.php');
            ?>
                
            <div class="hero">
    <h4>Leave Application</h4>
    <form class="row g-3 needs-validation" method="POST" action="submit_leave.php" novalidate>
        <div class="col-md-4">
            <label for="teacherId" class="form-label">Teacher ID</label>
            <input type="text" class="form-control" id="teacherId" value="<?php echo $row['ID'] ?>" name="teacher_id" readonly required>
        </div>
        <div class="col-md-4">
            <label for="teacherName" class="form-label">Teacher Name</label>
            <input type="text" class="form-control" id="teacherId" value="<?php echo $row['Name'] ?>" name="teacher_name" readonly required>
        </div>
        <div class="col-md-4">
            <label for="fromDate" class="form-label">From Date</label>
            <input type="date" class="form-control" id="fromDate" name="fromDate" required>
        </div>
        <div class="col-md-4">
            <label for="toDate" class="form-label">To Date</label>
            <input type="date" class="form-control" id="toDate" name="toDate" required>
        </div>
        <div class="col-md-6">
            <label for="reason" class="form-label">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit Leave Request</button>
        </div>
    </form>
</div>

<div class="past-leaves hero">
    <h4>Past Leave Requests</h4>
    <table class="table table-bordered">
        <thead>
            <tr class = "text-light">
                <th>From Date</th>
                <th>To Date</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch past leave records based on teacher_id
            $leaveQuery = "SELECT * FROM leaveapplications WHERE teacher_id = ?";
            $leaveStmt = $conn->prepare($leaveQuery);
            $leaveStmt->bind_param("i", $row['ID']); // Change here
            $leaveStmt->execute();
            $leaveResult = $leaveStmt->get_result();

            if ($leaveResult->num_rows > 0) {
                while ($leaveRow = $leaveResult->fetch_assoc()) {
                    // Set status color based on the status value
                    $statusClass = '';
                    switch ($leaveRow['status']) {
                        case 'approved':
                            $statusClass = 'text-success'; // Green
                            break;
                        case 'pending':
                            $statusClass = 'text-warning'; // Yellow
                            break;
                        case 'rejected':
                            $statusClass = 'text-danger'; // Red
                            break;
                    }
                    ?>
                    <tr>
                        <td class="text-light"><?php echo htmlspecialchars($leaveRow['start_date']); ?></td>
                        <td class="text-light"><?php echo htmlspecialchars($leaveRow['end_date']); ?></td>
                        <td class="text-light"><?php echo htmlspecialchars($leaveRow['reason']); ?></td>
                        <td class="<?php echo $statusClass; ?>"><?php echo htmlspecialchars($leaveRow['status']); ?></td>
                    </tr>
                    <?php
                }
            }else{
                echo "<tr><td colspan='4'>No past leaves found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

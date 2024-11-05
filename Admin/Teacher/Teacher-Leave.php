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
    <title>Teacher Dashboard | Salary</title>
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
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="timeTable.php">Class Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Student Performance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lesson Planning</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Assessment Tools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendar & Reminders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Professional Development</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo $row['Name'] ?> !</h2>
                <p>This is your salary page.</p>
            </div>

            <!-- Hero Section -->
            <div class="hero">
                <!-- <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image"> -->
                <div class="hero-details">
                    <?php if($row) { ?> 
                        <h5>Name: <?php echo $row['Name']; ?></h5> 
                        <p>Age: <?php echo $row['Age']; ?></p> 
                        <p>Gender: <?php echo $row['Gender']; ?></p>
                        <p>Subject: <?php echo $row['Subject']; ?></p> 
                        <p>Email: <?php echo $row['Email']; ?></p> 
                        <p>Phone: <?php echo $row['Phone']; ?></p> 
                        <p>Address: <?php echo $row['Address']; ?></p> 
                    <?php } else { ?>
                        <p>No information found for this teacher. where ID = <?php echo $name ?></p>
                    <?php } ?>
                </div>
            </div>

                
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

<div class="past-leaves">
    <h4>Past Leave Requests</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
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
                        <td><?php echo htmlspecialchars($leaveRow['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($leaveRow['end_date']); ?></td>
                        <td><?php echo htmlspecialchars($leaveRow['reason']); ?></td>
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

<!-- 
<div class="past-leaves">
    <h4>Past Leaves</h4>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">From Date</th>
                <th scope="col">To Date</th>
                <th scope="col">Reason</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch past leave records
            $leaveQuery = "SELECT * FROM leaveapplications WHERE teacher_id = ?";
            $leaveStmt = $conn->prepare($leaveQuery);
            $leaveStmt->bind_param("i", $row['ID']);
            $leaveStmt->execute();
            $leaveResult = $leaveStmt->get_result();

            // Displaying past leave records
            if ($leaveResult->num_rows > 0) {
                while ($leaveRow = $leaveResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$leaveRow['start_date']}</td>
                            <td>{$leaveRow['end_date']}</td>
                            <td>{$leaveRow['reason']}</td>
                            <td>{$leaveRow['status']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No past leaves found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div> -->


        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

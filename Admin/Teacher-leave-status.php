<?php
session_start();
include('database.php');

// Fetch all leave requests
$query = "SELECT * FROM leaveapplications";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Leave Requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="styles.css">
    <style>
        
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <!-- <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="../Login.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav> -->

    <!-- Sidebar -->
    <!-- <aside class="main-sidebar sidebar-dark-primary">
        <a href="admin_dashboard.php" class="brand-link">
            <span class="admin-dshbrd">Admin Dashboard</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="adminMain.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Teacher-leave-status.php" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Leave Requests</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_password.php" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Passwords</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_admission.php" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>Admissions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_messages.php" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_Students.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Students</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="textList.php" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Website Text Contents</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="textList.php" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Website Image Contents</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside> -->


    <?php
        include('Sidebar-Nav.php');
    ?>

    <div class="container-fluid-tls">
        <div class="card p-4">
            <h2 class="text-center">Teacher Leave Requests</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['teacher_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['teacherName']); ?></td>
                            <td><?php echo htmlspecialchars($row['reason']); ?></td>
                            <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['end_date']); ?></td>
                            <td>
                                <span class="status-text <?php echo ($row['status'] == 'approved') ? 'status-approved' : (($row['status'] == 'pending') ? 'status-pending' : 'status-rejected'); ?>">
                                    <?php echo htmlspecialchars($row['status']); ?>
                                </span>
                            </td>
                            <td>
                                <form action="update_status.php" method="POST">
                                    <input type="hidden" name="request_id" value="<?php echo $row['leave_id']; ?>">
                                    <select name="status" class="form-select mb-2" required>
                                        <option value="Approved" <?php echo ($row['status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Rejected" <?php echo ($row['status'] == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and FontAwesome -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>

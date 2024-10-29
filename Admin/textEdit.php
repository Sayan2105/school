<?php
include 'database.php';

// Ensure ID is set and is a number
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (!$id) {
    die("Invalid ID");
}

// Fetch content based on ID
$query = "SELECT * FROM page_content WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Check if the content was found
if (!$row) {
    die("Content not found or invalid ID.");
}

// Update the content if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_content = mysqli_real_escape_string($conn, $_POST['content'] ?? '');
    $update_query = "UPDATE page_content SET content = '$new_content' WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        header('Location: Changed.php');
        exit;
    } else {
        echo "Error updating content: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Login.php">Logout</a>
                </li>
            </ul>
        </nav>
        
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary">
            <a href="admin_dashboard.php" class="brand-link">
                <span class="admin-dshbrd">Admin Dashboard</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="adminMain.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_password.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Passwords</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_admission.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_messages.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_Students.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="textList.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Website Contents</p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
 

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Edit Content</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="content" class="form-label">Content:</label>
                                <textarea id="content" name="content" class="form-control" rows="10"><?php echo htmlspecialchars($row['content'] ?? ''); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="adminMain.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="path/to/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="path/to/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>

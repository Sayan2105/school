<?php
session_start();
include('database.php');

$query = "SELECT * FROM login"; 
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="Admin/Teacher/style.css"> -->

    <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../Login.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>
        
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="admin_dashboard.php" class="brand-link">
                <span class="brand-text">Admin Dashboard</span>
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
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>leave request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_password.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Passwords</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_admission.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_messages.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_Students.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="textList.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Website Text Contents</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="textList.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Website Image Contents</p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
 
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Main Admin table</h3>
                                </div>
                                <div class="card-body">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                                <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="admin_password.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Passwords</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="admin_admission.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_messages.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_Students.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Website links</h3>
                                </div>
                                <div class="card-body">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="../index.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Main Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../about.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>About us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../knowMore.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Know More</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Admission.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Contact.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Gallery.php" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                        
                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="path/to/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="path/to/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>

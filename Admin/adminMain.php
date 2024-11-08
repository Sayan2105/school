<?php
session_start();
if(!isset($_SESSION['ID'])){
    header('Location: ../index.php');
}

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
        <!-- AdminLTE CSS -->
        <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="Admin/Teacher/style.css"> -->

    <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar and SideBar-->
        <?php include('Sidebar-Nav.php'); ?>
 
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
                                
                                <p>Dashboard</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="admin_password.php" class="nav-link">
                                
                                <p>Passwords</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="admin_admission.php" class="nav-link">
                                
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_messages.php" class="nav-link">
                                
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_Students.php" class="nav-link">
                                
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="AddEvents.php" class="nav-link">
                                
                                <p>Add Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_teacher_messages.php" class="nav-link">
                                
                                <p>View Teacher Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewStudentMsg.php" class="nav-link">
                                
                                <p>View Student Messages</p>
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
                                
                                <p>Main Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../about.php" target="_blank" class="nav-link">
                                
                                <p>About us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../knowMore.php" target="_blank" class="nav-link">
                                
                                <p>Know More</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Admission.php" target="_blank" class="nav-link">
                                
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Contact.php" target="_blank" class="nav-link">
                                
                                <p>Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Gallery.php" target="_blank" class="nav-link">
                                
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

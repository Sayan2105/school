<?php
session_start();
// if (!isset($_SESSION['admin_logged_in'])) {
//     header("Location: Login.php");
//     exit();
// }

// Include database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "school"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT * FROM admission"; 
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admition Tables</title>
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
 

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Admission table</h3>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Grade</th>
                                                <th>DOB</th>
                                                <th>There Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['Name'] . "</td>";  
                                                echo "<td>" . $row['Email'] . "</td>";  
                                                echo "<td>" . $row['Grade'] . "</td>";  
                                                echo "<td>" . $row['DOB'] . "</td>";
                                                echo "<td>" . $row['AdditionalMessage'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
    <script src="AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>

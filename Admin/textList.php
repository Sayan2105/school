<?php
session_start();
// Start session to check if admin is logged in

include('database.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar and Sidebar -->
        <?php include('Sidebar-Nav.php'); ?>
 
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
                                    <h3 class="card-title">Pages Content table</h3>
                                </div>
                                <div class="card-body">
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

                                    <form action="" method = "post">
                                        <label for="choice"> Choose what you want to see. </label>
                                        <select name="choice" id="choice">
                                            <option value="Body">Body</option>
                                            <option value="About">About</option>
                                            <option value="KnowMore">Know More</option>
                                            <option value="Admission">Admission</option>
                                        </select>
                                        <button class = "btn btn-danger" type="submit">Submit</button>
                                    </form>

                                    <!-- Index -->
                                    <div class="container mt-4">
                                        <table id="dataTable" class="table table-bordered table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Page Name</th>
                                                    <th>Section Name</th>
                                                    <th>Show the Content</th>
                                                    <!-- <th>Content</th> -->
                                                    <th>Edit the Content</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if (isset($_POST['choice'])) {
                                                    $Choice = $_POST['choice'];
                                        
                                                    // Sample MySQL query to retrieve rows where Page_Name matches $Choice
                                                    $query = "SELECT ID, Page_Name, Section_Name FROM page_content WHERE Page_Name = ?";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $Choice);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                        
                                                    // Display only rows where Page_Name matches $Choice
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['ID'] . "</td>";
                                                        echo "<td>" . $row['Page_Name'] . "</td>";
                                                        echo "<td>" . $row['Section_Name'] . "</td>";
                                                        echo "<td> <button class='btn btn-primary btn-sm' type='button' onclick=\"window.open('textShow.php?id=" . $row['ID'] . "')\">Show</button> </td>";
                                                        echo "<td> <button class='btn btn-warning btn-sm' type='button' onclick=\"window.open('textEdit.php?id=" . $row['ID'] . "')\">Edit</button> </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<p>Please select a choice from the dropdown menu.</p>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

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

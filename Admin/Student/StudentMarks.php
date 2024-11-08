<?php include('includes/header.php'); ?>
<?php
    $name = $_SESSION['Name'];

    $MarksQuery = "SELECT grades.*, students.* FROM grades JOIN students ON grades.student_id = students.student_id WHERE students.first_name = ?"; 
    $MarksStmt = $conn->prepare($MarksQuery);
    $MarksStmt->bind_param('s', $name);
    // $MarksResult = mysqli_query($conn, $MarksQuery);
    $MarksStmt->execute();
    $MarksResult = $MarksStmt->get_result();
    
?>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Your Marks.</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students table</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Class</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Assignment Name</th>
                                        <th>Grade</th>
                                        <th>Date Assigned</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($MarksResult)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['student_id'] . "</td>";  
                                            echo "<td>" . $row['first_name'] . "</td>";  
                                            echo "<td>" . $row['last_name'] . "</td>";  
                                            echo "<td>" . $row['Subject'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['assignment_name'] . "</td>";
                                            echo "<td>" . $row['grade'] . "</td>";
                                            echo "<td>" . $row['date_assigned'] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
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

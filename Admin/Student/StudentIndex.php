<?php include('includes/header.php') ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </section>

            <!-- Main content -->
            <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo $row['first_name'] ?> !</h2>
                <p>This is your main.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('includes/hero.php');
            ?>

            <div class="rest">
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
                                <a href="StudentMarks.php" class="btn btn-info">View Performance</a>
                            </div>
                        </div>
                    </div>

                    <!-- Events Card -->
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Events</h5>
                                <p class="card-text">Upcoming School Events.</p>
                                <a href="../../knowMore.php" target="_blank" class="btn btn-info">Go to Salary page</a>
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
                                <a href="Student_Leave.php" class="btn btn-info">Request Leave</a>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Card -->
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Messages</h5>
                                <p class="card-text">Communicate with the Admin.</p>
                                <a href="Student-Msg-Admin.php" class="btn btn-info">Go to Messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="path/to/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="path/to/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>

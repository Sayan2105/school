<?php include('includes/header.php'); ?>
<div class="content-wrapper">

    <main class="col-md-9 col-lg-10 main-content">
        <div class="header">
                <h2>Welcome, <?php echo $row['first_name'] ?> !</h2>
                <p>Get all your leave information here.</p>
            </div>
            
            <!-- Hero Section -->
            <?php include('includes/hero.php'); ?>
                
                <div class="hero">
                    <h4>Leave Application</h4>
                    <form class="row g-3 needs-validation" method="POST" action="Student_Leave_insert.php" novalidate>
                        <div class="col-md-4">
                            <label for="teacherId" class="form-label">Student ID</label>
                            <input type="text" class="form-control" value="<?php echo $row['student_id'] ?>" name="teacher_id" readonly required>
                        </div>
                        <div class="col-md-4">
                            <label for="teacherName" class="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['first_name'] ?>" name="first_name" readonly required>
                        </div>

                        <div class="col-md-4">
                            <label for="teacherName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['last_name'] ?>" name="last_name" readonly required>
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
            </div>
    </main>

<!-- Bootstrap JS and FontAwesome -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>

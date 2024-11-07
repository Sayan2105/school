<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <main class="main-content">
            <h2>Dashboard Overview</h2>
            <section class="dashboard-overview card-grid">
                <div class="card">
                    <h3>Enrolled Courses</h3>
                    <p>5</p>
                </div>
                <div class="card">
                    <h3>Pending Assignments</h3>
                    <p>2</p>
                </div>
                <div class="card">
                    <h3>Overall GPA</h3>
                    <p>3.8</p>
                </div>
                <div class="card">
                    <h3>Notifications</h3>
                    <p>3 New</p>
                </div>
            </section>
        </main>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

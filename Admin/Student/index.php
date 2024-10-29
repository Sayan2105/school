<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-center">Dashboard Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Class Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Performance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lesson Planning</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Assessment Tools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendar & Reminders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Professional Development</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, Student!</h2>
                <p>Your dashboard at a glance</p>
            </div>

            <!-- Hero Section -->
            <div class="hero">
                <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image">
                <div class="hero-details">
                    <h5>Name: John Doe</h5>
                    <p>Age: 30</p>
                    <p>Gender: Male</p>
                    <p>Subject: Mathematics</p>
                    <p>Email: johndoe@example.com</p>
                    <p>Phone: 0129-88888</p>
                </div>
            </div>

            <div class="row g-3">
                <!-- Class Management Card -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Class Management</h5>
                            <p class="card-text">Manage schedules, attendance, and student rosters.</p>
                            <a href="#" class="btn btn-info">Go to Class Management</a>
                        </div>
                    </div>
                </div>

                <!-- Student Performance Card -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Student Performance</h5>
                            <p class="card-text">View grades, assignments, and progress reports.</p>
                            <a href="#" class="btn btn-info">View Performance</a>
                        </div>
                    </div>
                </div>

                <!-- Salary Card -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Salary</h5>
                            <p class="card-text">Know your Salary.</p>
                            <a href="#" class="btn btn-info">Go to Salary page</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-3">
                <!-- Assessment Tools Card -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Assessment Tools</h5>
                            <p class="card-text">Create assessments and track student performance.</p>
                            <a href="#" class="btn btn-info">Access Tools</a>
                        </div>
                    </div>
                </div>

                <!-- Leave Application -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Leave Application</h5>
                            <p class="card-text">Do you want to take a leave?</p>
                            <a href="#" class="btn btn-info">Request Leave</a>
                        </div>
                    </div>
                </div>

                <!-- Messages Card -->
                <div class="col-md-4">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Messages</h5>
                            <p class="card-text">Communicate with students and parents.</p>
                            <a href="#" class="btn btn-info">Go to Messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

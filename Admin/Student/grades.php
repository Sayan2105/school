<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <main class="main-content">
            <h2>Your Grades</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Introduction to Programming</td>
                        <td>A</td>
                        <td><button class="btn btn-primary">View Details</button></td>
                    </tr>
                    <tr>
                        <td>Data Structures</td>
                        <td>B+</td>
                        <td><button class="btn btn-primary">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

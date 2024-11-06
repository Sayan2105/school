<?php
    include('database.php');

    $id = $_GET['id'];

    $query = "SELECT content FROM page_content WHERE ID = $id";
    $result = mysqli_query($conn, $query);

    $content = '';

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $content = $row['content']; 
        } else {
            $content = 'No content found for this ID.'; 
        }
    } else {
        echo "Error: " . mysqli_error($conn); 
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

    <div class="container mt-5">
        <!-- Card for content display -->
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h2 class="card-title text-center text-primary mb-4">Content Details</h2>

                <p class="card-text lead">The text written is:</p>
                <div class="alert alert-info p-3">
                    <h4 class="mb-0"><?php echo $content ?? 'Default Heading'; ?></h4>
                </div>

                <hr>

                <p class="card-text">This is the ID of the requested option: <span class="fw-bold"><?php echo $id ?></span></p>
                <button class="btn btn-primary mt-3" onclick="window.location.href='edit_text.php?id=<?php echo $id; ?>'">Click here to edit</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE JS -->
        <script src="path/to/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="path/to/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>


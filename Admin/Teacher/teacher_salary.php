<?php
    session_start();
    include('../database.php');

    if(!isset($_SESSION['ID']))
        header("Location: ../Admin");

    $name = $_SESSION['Name'];

    $query = "SELECT * from `teacher_basicInfo` where name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | Salary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php
            include('sidebar.php');
        ?>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo $row['Name'] ?> !</h2>
                <p>This is your salary page.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('Hero.php');
            ?>
            
            
            
            <div class="hero">
                <div class="hero-details">
                    <?php if($row) { ?> 
                        <h5 class="hero-name">Name: <?php echo $row['Name']; ?></h5> 
                        <p class="hero-info">Your Annual salary is: <?php echo $row['Salary'] * 12; ?></p> 
                        <p class="hero-info">Monthly salary is: <?php echo $row['Salary']; ?></p>
                    <?php } else { ?>
                        <p class="hero-error">No information found for this teacher. where ID = <?php echo $name ?></p>
                    <?php } ?>
                </div>
            </div>


        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

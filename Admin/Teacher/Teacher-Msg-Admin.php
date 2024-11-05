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
        <nav class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-center">Dashboard Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="timeTable.php">Class Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Student Performance</a>
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
                <h2>Welcome, <?php echo $row['Name'] ?> !</h2>
                <p>This is your salary page.</p>
            </div>

            <!-- Hero Section -->
            <div class="hero">
                <!-- <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image"> -->
                <div class="hero-details">
                    <?php if($row) { ?> 
                        <h5>Name: <?php echo $row['Name']; ?></h5> 
                        <p>Age: <?php echo $row['Age']; ?></p> 
                        <p>Gender: <?php echo $row['Gender']; ?></p>
                        <p>Subject: <?php echo $row['Subject']; ?></p> 
                        <p>Email: <?php echo $row['Email']; ?></p> 
                        <p>Phone: <?php echo $row['Phone']; ?></p> 
                        <p>Address: <?php echo $row['Address']; ?></p> 
                    <?php } else { ?>
                        <p>No information found for this teacher. where ID = <?php echo $name ?></p>
                    <?php } ?>
                </div>
            </div>

                
            <div class="hero">
                <h4>Message to the Admin</h4>
                    <form class="row px-5 g-3" method="POST" action="send_message.php">
                        <div class="col-md-4">
                            <label for="teacherId" class="form-label">Teacher ID</label>
                            <input type="text" class="form-control" id="teacherId" value="<?php echo $row['ID'] ?>" name="teacher_id" readonly required>
                        </div>
                        <div class="col-md-4">
                            <label for="teacherName" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" id="teacherId" value="<?php echo $row['Name'] ?>" name="teacher_name" readonly required>
                        </div>
                        <textarea name="message" placeholder="Type your message here"></textarea>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                        </div>
                    </form>
            </div>
            
            
            <div class="hero">
                <h4>Previous Messages</h4>
                <div class="tma-p px-5 mx-5">
                    <?php
                
                        $teacher_id = $row['ID'];
                        $sql = "SELECT * FROM teacher_admin_messages WHERE teacher_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $teacher_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div>";
                                        echo "<h3>Message: " . $row['message'] . "</h3>";
                                        echo "<p>Sent At: " . $row['sent_at'] . "</p>";
                                        if ($row['reply']) {
                                            echo "<h3>Admin Reply: " . $row['reply'] . "</h3>";
                                            echo "<p>Replied At: " . $row['replied_at'] . "</p>";
                                        }
                                        echo "</div><hr>";
                                    }
                                } else {
                                    echo "No conversation history found.";
                                }
                        
                        $stmt->close();
                        $conn->close();
                    ?>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

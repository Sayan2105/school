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
    <title>Teacher Dashboard | Messages</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> -->
    <?php include('includeHeader.php'); ?>
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
                <p>Send a message to the Admin.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('Hero.php');
            ?>

                
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

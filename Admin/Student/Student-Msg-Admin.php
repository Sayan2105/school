<?php include('includes/header.php'); ?>
        <!-- Main Content -->
        <main class="content-wrapper col-md-9 col-lg-10 main-content">
            <div class="header">
                <h2>Welcome, <?php echo $row['first_name'] ?> !</h2>
                <p>Send a message to the Admin.</p>
            </div>

            <!-- Hero Section -->
            <?php
                include('includes/hero.php');
            ?>

                
            <div class="hero">
                <h4>Message to the Admin</h4>
                    <form class="row px-5 g-3" method="POST" action="send_message.php">
                        <div class="col-md-4">
                            <label for="studentId" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="studentId" value="<?php echo $row['student_id'] ?>" name="student_id" readonly required>
                        </div>
                        <div class="col-md-4">
                            <label for="studentName" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="studentId" value="<?php echo $row['first_name'] ?>" name="student_name" readonly required>
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
                
                        $student_id = $row['student_id'];
                        $sql = "SELECT * FROM student_messages WHERE StudentID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $student_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div>";
                                        echo "<h3>Message: " . $row['Body'] . "</h3>";
                                        if ($row['Reply']) {
                                            echo "<h3>Admin Reply: " . $row['Reply'] . "</h3>";
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

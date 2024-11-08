<?php
include('database.php');

// Fetch pending messages
$sql = "SELECT * FROM teacher_admin_messages WHERE status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Message Center</title>
        <!-- AdminLTE CSS -->
        <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-vtma">
        
        
        <div class="container-vtma">
        <h1>Admin Message Center</h1>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="message-card-vtma">
                    <p><span>From Teacher ID:</span> <?= htmlspecialchars($row['teacher_id']) ?></p>
                    <p><span>Teacher Name:</span> <?= htmlspecialchars($row['teacher_Name']) ?></p>
                    <p><span>Message:</span> <?= nl2br(htmlspecialchars($row['message'])) ?></p>
                    <p><span>Sent At:</span> <?= htmlspecialchars($row['sent_at']) ?></p>
                    <p><span>Msg ID: </span><?= htmlspecialchars($row['message_id']) ?> </p>

                    <form action="reply_vt_message.php" method="POST" class="reply-form-vtma">
                        <input type="hidden" name="message_id" value="<?= htmlspecialchars($row['message_id']) ?>">
                        <textarea name="reply" placeholder="Type your reply here" rows="3" required></textarea>
                        <button type="submit">Reply</button>
                    </form>
                </div>
                <hr>
                <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-messages-vtma">No pending messages.</p>
                    <?php endif; ?>
                    
                    <?php $conn->close(); ?>
    </div>

</body>
</html>

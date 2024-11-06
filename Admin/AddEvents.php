<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
        include('Sidebar-Nav.php');
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Add Event</h3>
                    </div>
                    <div class="card-body">
                        <form action="add_event_db.php" method="post">
                            <div class="form-group">
                                <label for="event_name">Event Name</label>
                                <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Enter event name" required>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Event Date</label>
                                <input type="date" id="event_date" name="event_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="event_days">Number of Days</label>
                                <input type="number" id="event_days" name="event_days" class="form-control" min="1" value="1" required>
                            </div>
                            <div class="form-group">
                                <label for="event_color">Event Color</label>
                                <input type="text" id="event_color" name="event_color" class="form-control" placeholder="e.g., red, blue">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

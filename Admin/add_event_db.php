<?php

include('database.php');

// Retrieve form data
$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_days = $_POST['event_days'];
$event_color = $_POST['event_color'];

// Insert the event into the database
$sql = "INSERT INTO events (event_name, event_date, event_days, event_color) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $event_name, $event_date, $event_days, $event_color);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the index page
header("Location: AddEvents.php");
exit();
?>

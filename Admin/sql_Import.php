<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statements to import
$sql = "
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

CREATE TABLE IF NOT EXISTS `page_content` (
  `ID` int(11) NOT NULL,
  `Page_Name` varchar(200) NOT NULL,
  `Section_Name` varchar(200) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `page_content` (`ID`, `Page_Name`, `Section_Name`, `Content`) VALUES

(24, 'About','about-h1','About Us');

ALTER TABLE `page_content`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `page_content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
";

// Execute multi query
if ($conn->multi_query($sql)) {
    echo "SQL imported successfully.";
} else {
    echo "Error importing SQL: " . $conn->error;
}

// Close connection
$conn->close();
?>

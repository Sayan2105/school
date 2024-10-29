
<?php
    include('databaseConn.php');

    // Query the content needed for the 'Body' page
    $query = "SELECT Section_Name, Content FROM page_content WHERE Page_Name='About'";
    $result = mysqli_query($conn, $query);

    $contentArray = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $contentArray[$row['Section_Name']] = $row['Content'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>

<body class="about-b">


    <div class="container mt-5">
        <h1 class="text-center abth1 mb-4"> <?php echo $contentArray['about-h1'] ?> </h1>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2"> <?php echo $contentArray['About-h2-1'] ?> </h2>
                <p> <?php echo $contentArray['About-p1'] ?> </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-2'] ?> </h2>
                <p> <?php echo $contentArray['About-p2'] ?> </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-3'] ?> </h2>
                <ul>
                    <?php echo $contentArray['About-p3'] ?>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-4'] ?> </h2>
                <p> <?php echo $contentArray['About-p4'] ?> </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-5'] ?> </h2>
                <?php echo $contentArray['About-p5'] ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-6'] ?> </h2>
                <?php echo $contentArray['About-p6'] ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-7'] ?> </h2>
                <?php echo $contentArray['About-p7'] ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-8'] ?> </h2>
                <?php echo $contentArray['About-p8'] ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2"> <?php echo $contentArray['About-h2-9'] ?> </h2>
                <?php echo $contentArray['About-p9'] ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class = "abth2" class = "abth2">Contact Us</h2>
                <p>For more information, please reach out to us at:</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Email:</strong> info@TVSacademy.edu</p>
                <p> <button type="button" class="btn btn-primary" onclick="window.open('Contact.php')"> click here</button></p>
            </div>
        </div>

        <footer class="text-center mt-4">
            <p>&copy; 2023 TVS Valley Academy. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

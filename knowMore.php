<?php
    include('databaseConn.php');

    // Query the content needed for the 'Body' page
    $query = "SELECT Section_Name, Content FROM page_content WHERE Page_Name='KnowMore'";
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
    <title>School Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        nav{
            width: 100vw;
        }
    </style>
    
</head>
<body>

<?php include('navbar.php'); ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <!-- Slide 1 with Quote -->
        <div class="carousel-item active"  data-bs-interval="1000">
            <img src="images/AdmissionImg.webp" class="d-block w-100" alt="Quote Slide">
            <div class="quote">
                <?php echo $contentArray['Quote'] ?>
            </div>
        </div>

        <!-- Slide 2 with Upcoming Activities -->
        <div class="carousel-item slide-2"  data-bs-interval="5000">
            
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 text-center mb-4 UA">
                        <h1> <?php echo $contentArray['Slide2-h1'] ?> </h1>
                    </div>
                    <div class="col-md-4">
                        <div class="activity-card">
                            <?php echo $contentArray['Activity-1'] ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-2'] ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-3'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-4'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-5'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-6'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                            <?php echo $contentArray['Activity-7'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                            <?php echo $contentArray['Activity-8'] ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="activity-card">
                        <?php echo $contentArray['Activity-9'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Slide 3 with toppors names -->
        <div class="carousel-item"  data-bs-interval="3000">
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h5> <?php echo $contentArray['Slide3-h1'] ?> </h5>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-1">
                   <?php echo $contentArray['Class-1'] ?> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-2">
                    <?php echo $contentArray['Class-2'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-3">
                    <?php echo $contentArray['Class-3'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-4">
                    <?php echo $contentArray['Class-4'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-1">
                    <?php echo $contentArray['Class-5'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-2">
                    <?php echo $contentArray['Class-6'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-3">
                    <?php echo $contentArray['Class-7'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-4">
                    <?php echo $contentArray['Class-8'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-1">
                    <?php echo $contentArray['Class-9'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-2">
                    <?php echo $contentArray['Class-10'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-3">
                    <?php echo $contentArray['Class-11'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card card-4">
                    <?php echo $contentArray['Class-12'] ?>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

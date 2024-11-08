<?php
    include('databaseConn.php');

    // Query the content needed for the 'Body' page
    $query = "SELECT Section_Name, Content FROM page_content WHERE Page_Name='Body'";
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
    <title>The School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php include('navbar.php'); ?>

    
    <!-- HERO Start -->
    <main class="main_content">
        <div class="hero-bg">
    <!-- Carousel Start -->
    <div id="schoolCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src='images/slider-12.jpeg' class="d-block w-100" alt="School Building">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src='images/slider-72.jpg' class="d-block w-100" alt="Students in Classroom">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src='images/slider-9.jpg' class="d-block w-100" alt="Outdoor School Activity">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#schoolCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#schoolCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel End -->
    
    <div id="home" class="index-hero-text text-center">
        
        <h1 class="display-4 fw-bold"><?php echo $contentArray['index-hero-h1'] ?? 'Default H1 Content'; ?></h1>
        
        <p class="lead mb-4"><?php echo $contentArray['index-hero-p'] ?></p>
        
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <button type="button" class="btn btn-secondary btn-lg px-4 me-sm-3" onclick="window.open('Signup.php')">Signup</button>
            <button type="button" class="btn btn-secondary btn-lg px-4 me-sm-3" onclick="window.open('Login.php')">Login</button>
            <button type="button" class="btn btn-primary btn-lg px-4" onclick="window.open('Admission.php')">Get your Admission</button>
        </div>
    </div>
</div>

<!-- Hero End -->


<!-- About Section Start -->
<div id="about" class="section">
    <div class="container">
        <h2 class="text-center mb-4"> <?php echo $contentArray['index-about-h2'] ?> </h2>
        <p id="about_text" class="text-center"> <?php echo $contentArray['index-about-p1'] ?> </p>
        <p class="text-center mb-0"> <?php echo $contentArray['index-about-p2'] ?> </p>
        
        <div class="Prog text-center my-5">
            <div class="container knowMoreSec">
                <h3> <?php echo $contentArray['index-about-h3'] ?></h3>
            </div>
            <button type="button" class="btn btn-info" onclick="window.open('about.php')">CLICK HERE</button>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- About Section End -->

<!-- Programs Section Start -->
    <div id="programs" class="section light">
        <div class="container">
            <h2 class="text-center mb-4"> <?php echo $contentArray['index-program-h2'] ?> </h2>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow">
                        <img src="images/earlyeducation.png" alt="Early Education" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $contentArray['index-program-h5-1'] ?> </h5>
                            <p class="card-text"><?php echo $contentArray['index-program-p1'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow">
                        <img src="images/Primary.jfif" alt="Primary Education" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $contentArray['index-program-h5-2'] ?> </h5>
                            <p class="card-text"> <?php echo $contentArray['index-program-p2'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow">
                        <img src="images/Secondary.jfif" alt="Secondary Education" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $contentArray['index-program-h5-3'] ?></h5>
                            <p class="card-text"><?php echo $contentArray['index-program-p3'] ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow">
                        <img src="images\Extracurricular.jfif" alt="Extracurricular" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $contentArray['index-program-h5-4'] ?> </h5>
                            <p class="card-text"> <?php echo $contentArray['index-program-p4'] ?> </p>
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="Prog text-center my-5">
                <div class="container knowMoreSec">
                    <h3> <?php echo $contentArray['index-program-h3'] ?> </h3>
            </div>
            <button type="button" class="btn btn-info" onclick="window.open('KnowMore.php')">CLICK HERE</button>
            </div>
        </div>
    </div>
    <!-- Programs Section End -->
    
    <!-- Admissions Section Start -->
    <div id="admissions" class="section">
        <div class="container">
            <h2 class="text-center mb-4"> <?php echo $contentArray['index-admission-h2'] ?> </h2>
            <!-- <p class="text-center">We are excited that you are considering joining our community! Our admissions process is straightforward and designed to help families find the right fit for their children.</p> -->
            <p class="text-center"> <?php echo $contentArray['index-admission-p1'] ?> </p>
            <p class="text-center mb-0"> <?php echo $contentArray['index-admission-p1-21'] ?> <a href="Admission.php" target = "_blank">Admission page.</a> <?php echo $contentArray['index-admission-p1-22'] ?> </p>
            
        </div>
    </div>
    <!-- Admissions Section End -->
    
    <!-- Contact Section Start -->
    <div id="contact" class="section light">
        <div class="container">
            <h2 class="text-center mb-4"> <?php echo $contentArray['index-contact-h2'] ?> </h2>
            <p class="text-center">Have questions? We're here to help! Reach out to us at <a href="mailto:sayannandi.2105@gmail.com">info@theschool.com</a> or call us at (123) 123-456.</p>
            <p class="text-center">You can also visit us at:</p>
            <address class="text-center mb-0">
                123 School Colony,<br>
                City,
            </address>
            <button type="button" class=" contact btn btn-primary btn-lg px-4" onclick="window.open('Contact.php')"> Contact Us</button>
        </div>
    </div>
    <!-- Contact Section End -->
    
    <!-- Footer Start -->
    <footer>
        <div class="container text-center">
            <p> &copy; 2024 The School. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->
</main> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




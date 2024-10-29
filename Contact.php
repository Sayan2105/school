<?php

$successMessage = "";
$errorMessage = "";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - The School</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="Contact-b">

    <!-- Nav Start -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">The School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#admissions">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#contact">Contact</a></li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-light me-2" onclick="window.open('Login.php')">Login</button>
                    <button type="button" class="btn btn-warning" onclick="window.open('Admission.php')">Get your Admission</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Nav End -->


    <!-- Contact Us Start -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Contact Us</h2>

        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <h5>Get in Touch</h5>
                <form method="POST" action="message_display.php">
                    <div class="mb-3">
                        Name <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        Email <span class="text-danger">*</span>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        Subject <span class="text-danger">*</span>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        Message <span class="text-danger">*</span>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
             
            <div class="col-md-6">
                <h5>Contact Information</h5>
                <p>Email: <a href="mailto:sayannandi.2105@gmail.com">sayannandi.2105@gmail.com</a></p>
                <p>Phone: <a href="tel:+91 9213715601"> +91 9213715601 </a></p>
                <p>Address:</p>
                <address>
                    123 School Colony,<br>
                    City,
                </address>
                <h5>Follow Us</h5>
                <p>
                    <a href="https://www.facebook.com/" target = "_blank">Facebook</a> | <a href="https://twitter.com/?lang=en" target = "_blank">Twitter</a> | <a href="https://www.instagram.com/accounts/login/" target = "_blank">Instagram</a>
                </p>
                <h5>Office Hours</h5>
                <p>Monday - Friday: 9 AM - 6 PM</p>
            </div>
        </div>

        <!-- LOCATION -->
        <h5>Directions</h5>
        <div class="text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1065.3252232399188!2d80.82921898580632!3d26.835668169301083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bffe63d041e9b%3A0x9ca55ed9def0ad91!2sDR.%20A.P.J.%20ABDUL%20KALAM%20COMPUTER%20INSTITUTE%20%7C%7C%20Best%20Computer%20Training%20Centre%20In%20Lucknow!5e1!3m2!1sen!2sin!4v1729571242849!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Footer Start -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024 The School. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

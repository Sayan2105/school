<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo htmlspecialchars($_GET['success']); ?>
    </div>
<?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
<?php endif; ?>

<?php
include('databaseConn.php');

// Query the content needed for the 'Amission' page
$query = "SELECT Section_Name, Content FROM page_content WHERE Page_Name='Admission'";
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
    <title>Admission - The School</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class ="AdmissionBody">

<?php include('navbar.php'); ?>

    <!-- Hero Section -->
    <div class="hero-adm  py-5">
        <?php echo $contentArray['Admission-Hero'] ?>
    </div>


    <!-- ADmission Info Start -->

        

        <div class="container mt-5">
    <h2 class="text-center text-primary mb-4"><?php echo $contentArray['Admission-h2-1'] ?></h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body">
                    <?php echo $contentArray['Step-1'] ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body">
                    <?php echo $contentArray['Step-2'] ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body">
                    <?php echo $contentArray['Step-3'] ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body">
                    <?php echo $contentArray['Step-4'] ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body">
                    <?php echo $contentArray['Step-5'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Admission Info End -->


<!-- Make sure to include FontAwesome for icons -->



        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom"></div>


        <!-- Admission Application Start -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Admission Application</h2>

        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form class="row g-3 needs-validation" method="POST" action="process_admission.php" novalidate>
            <div class="col-md-6">
                Name<span class="text-danger">*</span>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">
                    Please provide your name.
                </div>
            </div>
            <div class="col-md-6">
                Email <span class="text-danger">*</span>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            <div class="col-md-4">
                Grade Applying For <span class="text-danger">*</span>
                <input type="text" class="form-control" id="grade" name="grade" required>
                <div class="invalid-feedback">
                    Please specify the grade.
                </div>
            </div>
            <div class="col-md-4">
                Date of Birth <span class="text-danger">*</span>
                <input type="date" class="form-control" id="dob" name="dob" required>
                <div class="invalid-feedback">
                    Please provide your date of birth.
                </div>
            </div>
            <div class="col-md-4">
                Additional Message
                <textarea class="form-control" id="message" name="message" rows="2"></textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">
                        Agree to terms and conditions <span class="text-danger">*</span>
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <button class=" btn btn-dark" type="submit">Submit Application</button>
            </div>
        </form>
    </div>


    <!-- Admission Application End -->

    <!-- Footer Start -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024 The School. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>

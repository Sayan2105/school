<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="Login-b">

<div class="d-flex justify-content-center align-items-start" style="min-height: 100vh; padding-top: 50px;">
    <div class="container col-md-6 login-form-div">
        <h2 class="text-center mt-5">Signup Form</h2>
        <form action="SignupTeacherInsert.php" method="POST" class="mt-4" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>

            <div class="mb-4">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="Teacher">Teacher</option>
                </select>
            </div>

            <!-- <div class="mb-4">
                <label for="Photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="Photo" name="Photo" accept="image/jpeg" required>
            </div> -->

            <div class="mb-4">
                <label for="Age" class="form-label">Age</label>
                <input type="number" class="form-control" id="Age" name="Age" required>
            </div>

            <div class="mb-4">
                <label for="Gender" class="form-label">Gender</label>
                <select class="form-select" id="Gender" name="Gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="Subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="Subject" name="Subject" required>
            </div>

            <div class="mb-4">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>

            <div class="mb-4">
                <label for="Phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="Phone" name="Phone" required>
            </div>

            <div class="mb-4">
                <label for="Salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="Salary" name="Salary" required>
            </div>

            <div class="mb-4">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="Address">
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="CPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="CPassword" name="CPassword" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="window.open('Login.php')" class="btn btn-danger"> Already Registered? </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

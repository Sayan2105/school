<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class = "Login-b">

<?php include('navbar.php'); ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container col-md-6 login-form-div">
        <h2 class="text-center mt-5">Signup Form</h2>
        <form action="CheckPassword.php" method="POST" class="mt-4">
            <div class="mb-4">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>

            <div class="mb-4">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="Admin">Admin</option>
                </select>
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
            <button type="button" onclick = "window.open('Login.php')" class="btn btn-danger"> Already Registered? </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

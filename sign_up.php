<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_signup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container-box d-flex">
        <div class="form-box">
            <h2>Welcome!</h2>
            <p class="text-center intro">Please use your real name and valid email to ensure a smooth registration process.</p>

            <form action="submit.php" method="POST">
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email"  name="emailInput">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full name"  name="fullNameInput">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password"  name="passwordInput">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password"  name="confirmPasswordInput">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>

            <p class="mt-3 text-center">Already have an account? <a href="index.php" class="text-primary">Sign in</a></p>
        </div>
        <div class="image-box">
            <img src="image/image-2.png" alt="Sign Up Illustration">
        </div>
    </div>
</body>
</html>

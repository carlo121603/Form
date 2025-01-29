<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="toggle-password.js" defer></script>
</head>
<body>
<div class="container-box d-flex">
        <div class="image-box">
            <img src="image/image-1.png" alt="Login Illustration">
        </div>
        <div class="form-box">
            <h2>Hello, again!</h2>
            <p class="text-center">We are happy to have you back.</p>

            <form action="submit.php" method="POST">
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" 
                    name="emailInput">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="passwordInput" id="passwordInput">
              </div>
              <div class="form-check mt-2 mb-2">
                      <input type="checkbox" class="form-check-input" id="showPassword">
                      <label class="form-check-label" for="showPassword">Show Password</label>
                  </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <p class="mt-3 text-center">Don’t have an account? <a href="sign_up.php" class="text-primary">Register</a></p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minimal Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top px-3">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="btn btn-danger" onclick="logout()">Logout</button>
    </nav>

    <!-- Empty Content -->
    <div class="d-flex vh-100 justify-content-center align-items-center">
        <h5 class="text-muted">Welcome to the Dashboard</h5>
    </div>

    <script>
        function logout() {
            alert("Logged out!");
            window.location.href = "http://localhost/Task1-Neuralcore/index.php"; // Redirect to your actual logout page
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

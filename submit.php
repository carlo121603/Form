<?php
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Function to sanitize input
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Function to display SweetAlert
    function show_sweet_alert($icon, $title, $text = '', $redirect_url) {
        echo "
        <html lang='en'>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    text: '$text',
                    showConfirmButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function() {
                            window.location.href = '$redirect_url';
                        }, 1000);
                    }
                });
            </script>
        </body>
        </html>";
    }

    // Check if the 'fullNameInput' is set (this means the form is for sign up)
    if (isset($_POST['fullNameInput'])) {
        // Check if any field is empty
        if (empty($_POST['emailInput']) || empty($_POST['fullNameInput']) || 
            empty($_POST['passwordInput']) || empty($_POST['confirmPasswordInput'])) {
            show_sweet_alert(
                'error',
                'Please fill in all fields!',
                'All fields are required for registration.',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
            exit;
        }

        // Sanitize inputs
        $emailInput = sanitize_input($_POST['emailInput']);
        $fullNameInput = sanitize_input($_POST['fullNameInput']);
        $passwordInput = $_POST['passwordInput']; // Don't sanitize password
        $confirmPasswordInput = $_POST['confirmPasswordInput'];

        // Validate email
        if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
            show_sweet_alert(
                'error',
                'Invalid email format!',
                'Please enter a valid email address.',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
            exit;
        }

        // Check if password and confirm password match
        if ($passwordInput !== $confirmPasswordInput) {
            show_sweet_alert(
                'error',
                'Passwords do not match!',
                'Please make sure both passwords are the same.',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
            exit;
        }

        // Check if email already exists
        $check_stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $check_stmt->bind_param("s", $emailInput);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            show_sweet_alert(
                'error',
                'Email already exists!',
                'Please use a different email address.',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
            exit;
        }
        $check_stmt->close();

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (email, full_name, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $emailInput, $fullNameInput, $passwordInput);

        if ($stmt->execute()) {
            show_sweet_alert(
                'success',
                'Account created successfully!',
                '',
                'http://localhost/Task1-Neuralcore/index.php'
            );
        } else {
            show_sweet_alert(
                'error',
                'Error inserting record.',
                'Something went wrong. Please try again.',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
        }
        $stmt->close();
    } else {
        // Login Form
        if (empty($_POST['emailInput']) || empty($_POST['passwordInput'])) {
            show_sweet_alert(
                'error',
                'Please fill in all fields!',
                'Both email and password are required.',
                'http://localhost/Task1-Neuralcore/index.php'
            );
            exit;
        }

        // Sanitize inputs
        $emailInput = sanitize_input($_POST['emailInput']);
        $passwordInput = $_POST['passwordInput']; // Don't sanitize password

        // Validate email
        if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
            show_sweet_alert(
                'error',
                'Invalid email format!',
                'Please enter a valid email address.',
                'http://localhost/Task1-Neuralcore/index.php'
            );
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $emailInput, $passwordInput);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            show_sweet_alert(
                'success',
                'Login successful!',
                '',
                'http://localhost/Task1-Neuralcore/sign_up.php'
            );
        } else {
            show_sweet_alert(
                'error',
                'Invalid email or password.',
                'Please check your credentials and try again.',
                'http://localhost/Task1-Neuralcore/index.php'
            );
        }
        $stmt->close();
    }
    $conn->close();
}

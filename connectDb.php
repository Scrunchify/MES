<?php
session_start();

// Database configuration
$host = 'localhost'; // Database host
$dbname = 'itl_php'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Create PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    // Prepare the SQL query based on the selected role
    if ($role == 'customer') {
        $table = 'customers'; // Assume customers table exists
    } elseif ($role == 'employee') {
        $table = 'employees'; // Assume employees table exists
    } else {
        die("Invalid role");
    }

    // SQL query to get the user data from the database
    $sql = "SELECT * FROM $table WHERE username = :username LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $user);
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if (password_verify($pass, $userData['password'])) {
            // Password is correct, create session and redirect
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == 'customer') {
                header('Location: customer_dashboard.php'); // Customer dashboard
            } elseif ($role == 'employee') {
                header('Location: employee_dashboard.php'); // Employee dashboard
            }
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
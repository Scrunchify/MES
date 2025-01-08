<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=MES', 'root', 'mes2425');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);

        if($stmt->rowCount() > 0) {
                $error = "Username already exists!";
        }
        $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
        $stmt->execute(['username' => $username, 'password' => $hashed_password, 'role' => $role]);

        $success = "Account created successfully!";
    } catch (PDOException $e) {
        if(!isset($error))
        {
           $error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="employee">Employee</option>
                    <option value="customer">Customer</option>
                </select>
                <input type="submit" value="Create Account">
            </form>
            <form method="get" action="login.php">
                <input type="submit" value="Go to Login Page">
            </form>
        </form>
    </div>
</body>
</html>
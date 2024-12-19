<?php
    session_start();
    if (isset($_SESSION['employee_logged_in'])) {
        header("Location: employeesite.php");
        exit;
    } elseif (isset($_SESSION['customer_logged_in'])) {
        header("Location: customersite.php");
        exit;
    } else {
        header("Location: login.php");
        exit;
    }
?>
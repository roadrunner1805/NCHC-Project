<?php
session_start();

include 'connection.inc'; 

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($password)) {
    header("Location: login_failed.php");
    exit();
}

// Query the users table
$query = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Simple plain text password check (as per project requirements)
    if ($password === $row['password']) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: stats.php");
        exit();
    }
}

// Invalid login - redirect to dedicated failure page
header("Location: login_failed.php");
exit();
?>
<?php
session_start();
require __DIR__ . '/config/db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die("Email and password are required. <a href='index2.html'>Go back</a>");
}

$user = $users->findOne(['email' => $email]);

if (!$user) {
    die("User not found. <a href='index2.html'>Go back</a>");
}

if (!password_verify($password, $user['password'])) {
    die("Invalid password. <a href='index2.html'>Go back</a>");
}

// Login successful
$_SESSION['user'] = $user['email'];
header("Location: dashboard2.php");
exit;
?>
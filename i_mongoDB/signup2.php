<?php
session_start();
require __DIR__ . '/config/db2.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die("Email and password are required. <a href='index2.html'>Go back</a>");
}

// Check if user already exists
$existing = $users->findOne(['email' => $email]);
if ($existing) {
    die("User already exists. <a href='index2.html'>Go back</a>");
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user into MongoDB
$result = $users->insertOne([
    'email' => $email,
    'password' => $hashedPassword
]);

if ($result->getInsertedCount() === 1) {
    $_SESSION['user'] = $email;
    header("Location: dashboard2.php");
    exit;
} else {
    die("Signup failed. <a href='index2.html'>Try again</a>");
}
?>
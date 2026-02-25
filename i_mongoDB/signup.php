<?php
session_start();
require __DIR__ . '/config/db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die("Email and password are required.");
}

$existingUser = $users->findOne(['email' => $email]);

if ($existingUser) {
    die("User already exists. <a href='index.html'>Go back</a>");
}

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$users->insertOne([
    'email' => $email,
    'password' => $hashedPassword,
    'createdAt' => new MongoDB\BSON\UTCDateTime()
]);

echo "Signup successful! <a href='index.html'>Go to Login</a>";
?>

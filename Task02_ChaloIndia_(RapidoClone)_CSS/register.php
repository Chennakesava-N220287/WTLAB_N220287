<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "db.php";


$fullname   = trim($_POST['fullname']);
$email      = trim($_POST['email']);
$phone      = trim($_POST['phone']);
$password   = trim($_POST['password']);
$gender     = $_POST['gender'];
$created_at = $_POST['created_at'];

if (strlen($fullname) < 5) {
    die("Full name must be at least 5 characters");
}

if (strlen($phone) != 10 || !ctype_digit($phone)) {
    die("Phone number must be exactly 10 digits");
}

if (strlen($password) < 6) {
    die("Password must be at least 6 characters");
}

$email = strtolower($email);
$fullname = ucwords(strtolower($fullname));


$sql = "INSERT INTO users 
(fullname, email, phone, password, gender, created_at)
VALUES 
('$fullname', '$email', '$phone', '$password', '$gender', '$created_at')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful";
} else {
    die("SQL ERROR: " . mysqli_error($conn));
}


echo "<h2>String functions on fullname</h2>";
echo strlen($fullname) . "<br>";
echo strrev($fullname) . "<br>";
echo strtoupper($fullname) . "<br>";
echo strtolower($fullname) . "<br>";
echo ucfirst($fullname) . "<br>";
echo ucwords($fullname) . "<br>";

echo "<h2>All inputs validated successfully</h2>";
?>

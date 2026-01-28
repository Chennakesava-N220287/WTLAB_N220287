<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "db.php";

$fullname   = $_POST['fullname'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];
$password   = $_POST['password'];
$gender     = $_POST['gender'];
$created_at = $_POST['created_at'];

$sql = "INSERT INTO users 
(fullname, email, phone, password, gender, created_at)
VALUES 
('$fullname', '$email', '$phone', '$password', '$gender', '$created_at')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful";
} else {
    echo "SQL ERROR: " . mysqli_error($conn);
}
?>

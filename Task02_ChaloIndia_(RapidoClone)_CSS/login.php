<?php
include "db.php";

$email = $_POST['email'];
$fullname=$_POST['fullname'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    echo "Login successful";
} else {
    echo "Invalid login credentials";
}


echo "<br>";
$row = mysqli_fetch_assoc($result);
$db_email = $row['email'];
if (strcasecmp($email, $db_email) == 0) {
    echo "Login Successful";
} else {
    print "Invalid email";
    die();
}

?>

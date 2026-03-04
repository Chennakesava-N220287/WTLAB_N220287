<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index2.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> 🎉</h1>
<p>You are logged in successfully.</p>

<a href="logout2.php">Logout</a>

</body>
</html>
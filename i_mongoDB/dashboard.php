<?php
session_start();

// 🔐 Protect page
if (!isset($_SESSION['google_id'])) {
    header("Location: login.php"); // change to your login file
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$profile_pic = $_SESSION['profile_pic'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            text-align: center;
            padding-top: 50px;
        }
        .card {
            background: white;
            width: 350px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        img {
            border-radius: 50%;
            width: 100px;
            margin-bottom: 15px;
        }
        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: #d9534f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background: #c9302c;
        }
    </style>
</head>
<body>

<div class="card">
    <img src="<?php echo $profile_pic; ?>" alt="Profile Picture">
    <h2><?php echo htmlspecialchars($name); ?></h2>
    <p><?php echo htmlspecialchars($email); ?></p>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

</body>
</html>
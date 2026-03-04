<?php
require __DIR__ . '/../vendor/autoload.php'; // Composer autoload

use MongoDB\Client;

// Connect to MongoDB
$client = new Client("mongodb://127.0.0.1:27017");

// Select your database and collection
$db = $client->i_mongoDB;      // Change if your DB name is different
$users = $db->users;            // Collection for users
?>
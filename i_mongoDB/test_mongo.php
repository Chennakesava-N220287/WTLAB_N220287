<?php
require __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->mydatabase->users;

$users = $collection->find();

foreach ($users as $user) {
    echo "Name: " . $user['name'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
    echo "Age: " . $user['age'] . "<br><hr>";
}
?>

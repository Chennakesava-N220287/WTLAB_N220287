<?php
require 'vendor/autoload.php'; // Composer autoload

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->selectDatabase("i_mongoDB"); // your DB name
    $collection = $db->users; // example collection

    $document = $collection->findOne(); // fetch one document
    echo "<pre>";
    print_r($document);
    echo "</pre>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
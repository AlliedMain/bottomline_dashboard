<?php
require '../vendor/autoload.php';

use Kreait\Firebase\Factory;

// Initialize Firebase with the Service Account credentials
$factory = (new Factory)
    ->withServiceAccount('firebase_credentials.json');  // Replace with the actual path to your credentials

// Create Firestore instance
$firestore = $factory->createFirestore();
$database = $firestore->database();

// Example: Add a document to the 'pubs' collection
$collection = $database->collection('epubs');
$document = $collection->create([
    'title' => 'Sample Title',
    'author' => 'Sample Author',
    'about' => 'Sample about description'
]);

echo "Document added with ID: " . $document->id();
?>


/*require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
// Initialize Firebase with the Service Account credentials
$factory = (new Factory)
    ->withServiceAccount('firebase_credentials.json');  // Replace with the actual path to your credentials

// Create Firestore instance
$firestore = $factory->createFirestore();
$database = $firestore->database();

// Example: Add a document to the 'pubs' collection
$collection = $database->collection('epubs');
//print_r($collection); exit;
$document = $collection->add([
    'title' => 'Sample Title',
    'author' => 'Sample Author',
    'about' => 'Sample about description'
]);
print_r($document); exit;
echo "Document added with ID: " . $document->id();*/
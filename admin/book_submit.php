<?php
require '../vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

// Initialize Firebase with the Service Account credentials
$factory = (new Factory)
    ->withServiceAccount('firebase_credentials.json');  // Correct path to your credentials file

// Create Firestore instance
$firestore = $factory->createFirestore();
$database = $firestore->database();

if(isset($_POST['add_book'])){

    //Add a document to 'books' collection
    $collection = $database->collection('epubs');
    $document = $collection->add([
        'title' => 'Sample Book',
        'author' => 'author here.',
        'about' => 'test test test'
    ]);
    $bookId = $document->id();
    if(!empty($bookId)){
        header('Location: add_books.php?msg=success');
    }else{
        header('Location: add_books.php?msg=error');
    }
//echo "Book added successfully with Document ID: " . $document->id();
}


//Delete a record
if(isset($_REQUEST['delete']))
{
    // Specify the collection and the document ID to delete
    $collection = $database->collection('epubs');   
    $documentId = $_GET['id'];   

    // Delete the document
    $collection->document($documentId)->delete();

    echo "Document with ID: " . $documentId . " has been deleted successfully.";
}


//Update
if(isset($_POST['update_book'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $about = $_POST['about'];
$collection = $database->collection('epubs');   
$documentId = $_POST['documentid'];   

// Prepare the data to update
$updatedData = [
    ['path' => 'title', 'value' => $title],   // Update the 'title' field
    ['path' => 'author', 'value' => $author], // Update the 'author' field
    ['path' => 'about', 'value' => $about]    // Update the 'about' field
];

// Update the document
$collection->document($documentId)->update($updatedData);

echo "Document with ID: " . $documentId . " has been updated successfully.";
}

//Select _by_id
if(isset($_GET['id'])){
$collection = $database->collection('epubs');  // Replace 'pubs' with your collection name
    $documentId = $_GET['id'];  // Replace with the actual document ID you want to retrieve

    // Retrieve the document snapshot
    $document = $collection->document($documentId)->snapshot();

    if ($document->exists()) {
        echo "Document ID: " . $documentId . "\n";
        echo "Title: " . $document['title'] . "\n";
        echo "Author: " . $document['author'] . "\n";
        echo "About: " . $document['about'] . "\n";
    } else {
        echo "Document with ID: " . $documentId . " does not exist.";
    }
}
<?php
session_start();
require_once('inc/db.php');

$userEmail = mysqli_real_escape_string($connect,$_POST["email"]);
$userPassw = mysqli_real_escape_string($connect,$_POST["password"]);
$passw  = sha1($userPassw);
$chkLogin = mysqli_query($connect,"SELECT * FROM admin_user WHERE email = '$userEmail' AND password = '$passw' AND status=1");

if(mysqli_num_rows($chkLogin) == 0){
    header('Location: index.php?err');exit();
} else{
   $userData = mysqli_fetch_assoc($chkLogin);
    $userId = $userData["uid"];
    $userName = $userData["fname"].' '.$userData["lname"];
    $email = $userData["email"];
    $phone = $userData["phone"];
    $role = $userData["role"];
}

$_SESSION['userId'] = $userId;
$_SESSION['userName'] = $userName;
$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;
$_SESSION['role'] = $role;

header('Location: admin-dashboard.php');
        exit();

/*require '../vendor/autoload.php';  // Make sure to include the Firebase SDK autoload file

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

// Load Firebase credentials
$firebase = (new Factory)
    ->withServiceAccount('firebase_credentials.json') // Path to your Firebase credentials file
    ->createAuth();  // Get the Firebase Auth instance directly

$auth = $firebase;  // Now, $firebase is the auth instance

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Sign in with email and password
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);

        // Get the user's info
        $user = $signInResult->data();

        session_start();
        $_SESSION['user'] = $user;

        // Redirect to dashboard
        header('Location: admin-dashboard.php');
        exit();

    } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
        //echo "Error: Invalid password!";
         header('Location: index.php?err');exit();
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo "Error: User not found!";
        header('Location: index.php?err'); exit();
    } catch (Exception $e) {
        header('Location: index.php?err');exit();
    }
}*/


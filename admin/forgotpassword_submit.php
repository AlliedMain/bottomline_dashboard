<?php

require '../vendor/autoload.php';

use Mailgun\Mailgun;

$mgClient  = Mailgun::create('6b441b0fe1642a529054802e2e6de1b7-30b58138-a8e6a91d');
$domain = "mg.prymelinkllc.com";

require_once('inc/db.php');

date_default_timezone_set('America/Los_Angeles');
$base_url = $_SERVER['SERVER_NAME'];
$userEmail = mysqli_real_escape_string($connect,$_POST["email"]);

$chkEmail = mysqli_query($connect,"SELECT * FROM admin_user WHERE email = '$userEmail' AND status=1");

if(mysqli_num_rows($chkEmail) == 0){
    header('Location: forgot-password.php?msg=3');exit();
} else {
   $userData = mysqli_fetch_assoc($chkEmail);
    $userId = $userData["uid"];
    $userName = $userData["fname"].' '.$userData["lname"];
    $toEmail = $userData["email"];
$currentDateTime = date('Y-m-d H:i:s');
$newToken = $userId.$toEmail.$currentDateTime;

$tokenString = sha1($newToken); 

$randomString = generateRandomString(100); 

$resetUrl = $base_url."/reset-password.php?tkn=".$tokenString."&key=".$randomString;

$recipientEmail = $toEmail;
$senderName = 'Bottomline';
$senderEmail = 'no-reply@bottomline.com';

// Create email content
$subject = 'Password Reset Request for Your Bottomline Account';
 
$textBody = 'This is a test email sent using Mailgun.';

 $htmlBody= '<table style="width: 75%; text-align: center; background-color: #0dd6b8;" border="0" > 
<tr style="height:40px;"><td><img src="images/logo.png"></td></tr>
<tr style="height:30px;"><td><strong>Hi '.ucfirst($userName).', Lets reset your password.</strong> </td></tr>
<tr style="height:30px;"><td><a href="'.$resetUrl.'" taget="_blank"><input type="button" value="Reset Password" style="font-size: 14px; border-radius: 4px; background-color: #ffba68;border-color: #ffba68;font-size: 14px;
    border-radius: 4px; display: inline-block; font-weight: 400;color: #212529; text-align: center;
    vertical-align: middle; border: 1px solid transparent; padding: .375rem .75rem; font-size: 1rem;
    line-height: 1.5; cursor: pointer;"></a></td></tr>
<tr style="height:30px;"><td>If the above button doen not work for you, copy the below link into your browser address bar.</td></tr>
<tr style="height:30px;"><td>'.$resetUrl.'</tr>
<tr style="height:30px;"><td><hr/><i>If you did not ask to reset your password, you can disregard this email.</i></td></tr>
</table>';





// Send the email
$result = $mgClient->messages()->send($domain, [
    'from' => "$senderName <$senderEmail>",
    'to' => $recipientEmail,
    'subject' => $subject,
    'html' => $htmlBody,
    'text' => $textBody,
]);

    //Insert into admin_password_reset_token
    $insertUser = mysqli_query($connect,"INSERT INTO admin_password_reset_token(uid,token)
         VALUES($userId,'$tokenString')");
    $lastInsertId = mysqli_insert_id($connect); 
    
    // Check the result and handle any errors
    if ($result->http_response_code != 200 && $lastInsertId !=0) {
       header('Location: confirm-mail.php');
    } else {
       header('Location: forgot-password.php?msg=2');
    }

}


       

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


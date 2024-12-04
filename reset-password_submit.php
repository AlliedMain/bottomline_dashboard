<?php
require_once('admin/inc/db.php');

   if(isset($_POST['upd_password'])){

   		$token = mysqli_real_escape_string($connect,$_POST['ptoken']);
         $npassw = mysqli_real_escape_string($connect,$_POST["npass"]);
         $vpassw = mysqli_real_escape_string($connect,$_POST["vpass"]);
         
         $newPassword = sha1($vpassw);

         //Check old password
         $chkToken = mysqli_query($connect,"SELECT * FROM admin_password_reset_token WHERE token = '$token' AND status = 1");

          if(mysqli_num_rows($chkToken) == 1){ //if token available
             $userData = mysqli_fetch_assoc($chkToken);
    
            $uid = $userData["uid"];
          	$updatePassword = mysqli_query($connect,"UPDATE `admin_user` SET `password` = '$newPassword' WHERE uid = $uid");
            $updTknStatus = mysqli_query($connect,"UPDATE `admin_password_reset_token` SET `status` = 2 WHERE uid = $uid  AND token = '$token'");
          	header('Location: success.php');exit();

          } else {
          	//Error old passw is not correct
          	header('Location: reset-password.php?msg=err');exit();
          }
}

?>
<?php
require_once('inc/db.php');

   if(isset($_POST['upd_profile'])){

   		 $uid = mysqli_real_escape_string($connect,$_POST['uid']);
         $fname = mysqli_real_escape_string($connect,$_POST["fname"]);
         $lname = mysqli_real_escape_string($connect,$_POST["lname"]);
         $phone = mysqli_real_escape_string($connect,$_POST["phone"]);

         $updateProfile = mysqli_query($connect,"UPDATE `admin_user` SET `fname` = '$fname',`lname` = '$lname',`phone` = '$phone' WHERE uid = $uid ");

          header('Location: profile-edit.php?msg=success');exit();
    }

    if(isset($_POST['upd_password'])){

   		 $uid = mysqli_real_escape_string($connect,$_POST['uid']);
         $cpassw = mysqli_real_escape_string($connect,$_POST["cpass"]);
         $npassw = mysqli_real_escape_string($connect,$_POST["npass"]);
         $vpassw = mysqli_real_escape_string($connect,$_POST["vpass"]);
         
         $oldPassword = sha1($cpassw);
         $newPassword = sha1($vpassw);

         //Check old password
         $chkPassw = mysqli_query($connect,"SELECT * FROM admin_user WHERE password = '$oldPassword' AND uid = $uid");

          if(mysqli_num_rows($chkPassw) == 1){ //old Password match
          	$updatePassword = mysqli_query($connect,"UPDATE `admin_user` SET `password` = '$newPassword' WHERE uid = $uid ");
          	header('Location: profile-edit.php?msg=success');exit();

          } else {
          	//Error old passw is not correct
          	header('Location: profile-edit.php?msg=mismatch');exit();
          }
}

?>
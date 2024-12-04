<?php 
require_once('inc/db.php');

   if(isset($_POST['add_user'])){

         $fname = mysqli_real_escape_string($connect,$_POST["fname"]);
         $lname = mysqli_real_escape_string($connect,$_POST["lname"]);
         $email = mysqli_real_escape_string($connect,$_POST["email"]);
         $phone = mysqli_real_escape_string($connect,$_POST["phone"]);
         $role = mysqli_real_escape_string($connect,$_POST["role"]);
         $userPassw = mysqli_real_escape_string($connect,$_POST["pass"]);
         $passw  = sha1($userPassw);

         $chkUser = mysqli_query($connect,"SELECT * FROM admin_user WHERE email = '$email'");
  
         if(mysqli_num_rows($chkUser) == 0){
       
            $insertUser = mysqli_query($connect,"INSERT INTO `admin_user`(`fname`, `lname`, `email`, `password`, `phone`,  `role`) VALUES ('$fname','$lname','$email','$passw','$phone',$role)");
            $userId = mysqli_insert_id($connect); 
            if($userId > 0){
               header('Location: add_user.php?msg=success');exit();
            } else{
               header('Location: add_user.php?msg=err');exit();
            }
         }else{
            header('Location: add_user.php?msg=exist');exit();
         }
      }

      //Update

      if(isset($_POST['update_user'])){
         $uid= mysqli_real_escape_string($connect,$_POST['uid']);
         $fname = mysqli_real_escape_string($connect,$_POST["fname"]);
         $lname = mysqli_real_escape_string($connect,$_POST["lname"]);
         $email = mysqli_real_escape_string($connect,$_POST["email"]);
         $phone = mysqli_real_escape_string($connect,$_POST["phone"]);
         $status = mysqli_real_escape_string($connect,$_POST["status"]);
         $role = mysqli_real_escape_string($connect,$_POST["role"]);
         $passw = mysqli_real_escape_string($connect,$_POST["pass"]);
         
         $updateProfile = mysqli_query($connect,"UPDATE `admin_user` SET `fname` = '$fname',`lname` = '$lname',`phone` = '$phone', `status`=$status,`role`=$role WHERE uid = $uid ");

         if(!empty($passw)){
            $updateProfile = mysqli_query($connect,"UPDATE `admin_user` SET `password` = '$passw' WHERE uid = $uid");
         }

         if(!empty($_POST["pass"])){
            $userPassw = mysqli_real_escape_string($connect,$_POST["pass"]);
            $passw  = sha1($userPassw);
         }

         header('Location: user_list.php?msg=success');exit();



      }
   
   ?>
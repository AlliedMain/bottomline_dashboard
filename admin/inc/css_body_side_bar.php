<?php
session_start();
if(!isset($_SESSION['userId'])){
   header("Location:index.php");
}

 require_once('db.php'); //Database connection

$message = '';
if(isset($_REQUEST['msg']))
{
   if($_REQUEST['msg'] == 'success')
   {
      $message = '<p style="color:green">Data Inserted Successfully</p>';
   } else {
      $message = '<p style="color:red">Data Insertion Failed</p>';
   }
}
?>
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/booksto/html/form-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 18:58:21 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Booksto - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
     <!--  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"> -->
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
<body class="sidebar-main-active right-column-fixed">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="admin-dashboard.php" class="header-logo">
                  <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                 <div class="logo-title">
                     <span class="text-primary text-uppercase">Bottom Line</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a href="admin-dashboard.php" class="iq-waves-effect"  aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     </li>
                     <li>
                        <a href="#books" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-line"></i><span>Books</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="books" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="add_books.php"><i class="las la-plus-circle"></i>Add Books</a></li>
                           <li><a href="books_list.php"><i class="las la-th-list"></i>Books List</a></li>
                        </ul>
                     </li>
                     <?php if($_SESSION['role'] ==1){?>
                     <li>
                        <a href="#adminUsers" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-line"></i><span>Admin Users</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="adminUsers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="add_user.php"><i class="las la-plus-circle"></i>Add Admin</a></li>
                           <li><a href="user_list.php"><i class="las la-th-list"></i>Admin List</a></li>
                        </ul>
                     </li>
                  <?php } ?>
                     
                  </ul>
               </nav>
               
            </div>
         </div>
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/booksto/html/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 18:58:25 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Bottomline | Admin Dashboard</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                                <h3 class="mb-0 text-white">Reset Password</h3>
                                <p class="text-white">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                 
                                  <?php 
                                if(isset($_REQUEST['msg'])){
                                  if($_REQUEST['msg'] == 1){
                               ?>
                                  <p style="color: green;text-align: center;font-weight: 400;">A password reset email has been sent to your email id.</p>
                                <?php } 
                                else if($_REQUEST['msg'] == 2){
                                  ?>
                                  <p style="color: red;text-align: center;font-weight: 400;">Something went wrong. Please try again.</p>
                                <?php
                                } 
                                else if($_REQUEST['msg'] == 3){
                                  ?>
                                  <p style="color: red;text-align: center;font-weight: 400;">The email id is not registered with us.</p>
                                <?php
                                } 
                              ?>
                              
                              <?php } ?>
                              
                              <form class="mt-4 form-text" action="forgotpassword_submit.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" name="email" id="email" required style="color: #000;">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <button type="submit" class="btn btn-white">Reset Password</button>
                                    </div>
                                </form>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
         <!-- color-customizer -->
       
       <!-- color-customizer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- Style Customizer -->
      <script src="js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>

<!-- Mirrored from templates.iqonic.design/booksto/html/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 18:58:25 GMT -->
</html>
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/booksto/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 18:58:25 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Password Reset | Bottom Line</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="admin/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="admin/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="admin/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="admin/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="admin/css/responsive.css">
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
                              <h3 class="mb-0 text-center text-white">Reset Password</h3>
                             <?php if(isset($_REQUEST['msg'])){
                              if($_REQUEST['msg'] == 'err'){
                              ?>
                             <p style="color:red; text-align: center;">Something went wrong. Please try again.</p>
                           <?php } }

                           if(isset($_REQUEST['tkn'])){
                              $token = $_REQUEST['tkn'];
                           }else{
                            $token ='';
                           }
                           ?>
                              <form class="mt-4 form-text" action="reset-password_submit.php" method="POST">
                                <input type="hidden" name='ptoken' value="<?php echo $token;?>">
                                  <div class="form-group">
                                      <label for="npassw">New Password</label>
                                      <input type="password" class="form-control mb-0" id="npass" name="npass" placeholder="Enter New Password" style="color:#000;" oninput="compareStrings()" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Confirm New Password</label>
                                       
                                      <input type="password" class="form-control mb-0" id="vpass" name="vpass" placeholder=" Enter Verify Password" style="color:#000;" oninput="compareStrings()" required>
                                       <p id="error-message"></p>
                                  </div>
                                  
                                   
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-white d-block w-100 mb-2" name="upd_password" id="upd_password" disabled><strong>Update Password</strong></button>
                                      <!-- <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="sign-up.html" class="text-white">Sign up</a></span> -->
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
        <script>
      function compareStrings() {
  const input1 = document.getElementById('npass').value;
  const input2 = document.getElementById('vpass');
  const submitButton = document.getElementById('upd_password');

  if (input1 !== input2.value) {
    input2.style.border = '1px solid red';
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = 'Password do not match.';
    errorMessage.style.color = 'red';
    errorMessage.style.display = 'block';
    
  } else {
    input2.style.border = '';
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = '';
    errorMessage.style.display = 'none';
    submitButton.disabled = false;
  }
}
   </script>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="admin/js/jquery.min.js"></script>
      <script src="admin/js/popper.min.js"></script>
      <script src="admin/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="admin/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="admin/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="admin/js/waypoints.min.js"></script>
      <script src="admin/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="admin/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="admin/js/apexcharts.js"></script>
      <!-- lottie JavaScript -->
      <script src="admin/js/lottie.js"></script>
      <!-- Slick JavaScript --> 
      <script src="admin/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="admin/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="admin/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="admin/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="admin/js/smooth-scrollbar.js"></script>
      <!-- Style Customizer -->
      <script src="admin/js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="admin/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="admin/js/custom.js"></script>
   </body>

<!-- Mirrored from templates.iqonic.design/booksto/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 18:58:25 GMT -->
</html>

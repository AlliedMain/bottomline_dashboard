<?php 
   $pageName = 'Admin Profile';
   $breadCrumbs = 'Admin Profile';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');

$uid = $_SESSION['userId'];
   $adminList = mysqli_query($connect,"SELECT * FROM admin_user WHERE uid=".$uid);

  $userData = mysqli_fetch_assoc($adminList);

    // Access individual fields using the column names
    $uid = $userData['uid'] ? $userData['uid'] :'';
    $fname = $userData['fname'] ? $userData['fname'] :'';
    $lname = $userData['lname'] ? $userData['lname'] :'';
    $email = $userData['email'] ? $userData['email'] :'';
    $phone = $userData['phone'] ? $userData['phone'] :'';

?> 

      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                           <ul class="iq-edit-profile d-flex nav nav-pills">
                              <li class="col-md-3 p-0">
                                 <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                 </a>
                              </li>
                              <li class="col-md-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                 </a>
                              </li>
                              <!-- <li class="col-md-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                    Email and SMS
                                 </a>
                              </li>
                              <li class="col-md-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                    Manage Contact
                                 </a>
                              </li> -->
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-edit-list-data">
                     <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form action="profile-update.php" method="POST">
                                    <!-- <div class="form-group row align-items-center">
                                       <div class="col-md-12">
                                          <div class="profile-img-edit">
                                             <img class="profile-pic" src="images/user/11.png" alt="profile-pic">
                                             <div class="p-image">
                                                <i class="ri-pencil-line upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div> -->
                                    <input type="hidden" name='uid' value="<?php echo $_SESSION['userId'];?>">
                                    <div class=" row align-items-center">
                                       <div class="form-group col-sm-6">
                                          <label for="fname">First Name:</label>
                                          <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname;?>">
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="lname">Last Name:</label>
                                          <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname;?>">
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="email">Email:</label>
                                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" readonly>
                                       </div>
                                      <div class="form-group col-sm-6">
                                          <label for="phone">Contact Number:</label>
                                          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
                                       </div>
                                       </div>
                                    <button type="submit" class="btn btn-primary mr-2" name='upd_profile'>Update</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form action="profile-update.php" method="POST">
                                    <input type="hidden" name='uid' value="<?php echo $_SESSION['userId'];?>">
                                    <div class="form-group">
                                       <label for="cpass">Current Password:</label>
                                       <!-- <a href="javascripe:void();" class="float-right">Forgot Password</a> -->
                                       <input type="Password" class="form-control" id="cpass" name="cpass" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="npass">New Password:</label>
                                       <input type="Password" class="form-control" id="npass" name="npass" oninput="compareStrings()" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="vpass">Verify Password:</label>
                                       <input type="Password" class="form-control" id="vpass" name="vpass" oninput="compareStrings()" required>
                                       <p id="error-message"></p>
                                    </div>  
                                    <button type="submit" class="btn btn-primary mr-2" name='upd_password' id='upd_password' disabled>Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Email and SMS</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form>
                                    <div class="form-group row align-items-center">
                                       <label class="col-8 col-md-3" for="emailnotification">Email Notification:</label>
                                       <div class="col-4 col-md-9 custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                          <label class="custom-control-label" for="emailnotification"></label>
                                       </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                       <label class="col-8 col-md-3" for="smsnotification">SMS Notification:</label>
                                       <div class="col-4 col-md-9 custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                          <label class="custom-control-label" for="smsnotification"></label>
                                       </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                       <label class="col-md-3" for="npass">When To Email</label>
                                       <div class="col-md-9">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email01">
                                             <label class="custom-control-label" for="email01">You have new notifications.</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email02">
                                             <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                             <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                       <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                       <div class="col-md-9">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email04">
                                             <label class="custom-control-label" for="email04"> Upon new order.</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email05">
                                             <label class="custom-control-label" for="email05"> New membership approval</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                             <label class="custom-control-label" for="email06"> Member registration</label>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Manage Contact</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form>
                                    <div class="form-group">
                                       <label for="cno">Contact Number:</label>
                                       <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                    </div>
                                    <div class="form-group">
                                       <label for="email">Email:</label>
                                       <input type="text" class="form-control" id="email" value="Barryjone@demo.com">
                                    </div>
                                    <div class="form-group">
                                       <label for="url">Url:</label>
                                       <input type="text" class="form-control" id="url" value="https://getbootstrap.com/">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
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
   <!-- Footer -->
  <?php include('inc/footer.php');?>
   <!-- Footer END -->
   <!-- color-customizer -->
   <?php include('inc/load_javascript.php');?>
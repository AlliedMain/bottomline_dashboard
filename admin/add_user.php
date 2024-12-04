<?php 
   $pageName = 'Add Admin User';
   $breadCrumbs = 'Add Admin User';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
?> 

<?php
if(isset($_REQUEST['msg']))
{
   if($_REQUEST['msg'] == 'success')
   {
      echo '<script> alert("User Data Inserted Successfully");</script>';
   }

   else if($_REQUEST['msg'] == 'err')
   {
      echo '<script> alert("User Data Insertion Failed");</script>';
   }
   else if($_REQUEST['msg'] == 'exist')
   {
      echo '<script> alert("User already exist");</script>';
   }
}
?>
         <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <!-- <div class="col-lg-3">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add New User</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form>
                           <div class="form-group">
                              <div class="add-img-user profile-img-edit">
                                 <img class="profile-pic img-fluid" src="images/user/11.png" alt="profile-pic">
                                 <div class="p-image">
                                   <a href="javascript:void();" class="upload-button btn iq-bg-primary">File Upload</a>
                                   <input class="file-upload" type="file" accept="image/*">
                                </div>
                              </div>
                             <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                    <span>Only</span>
                                   <a href="javascript:void();">.jpg</a>
                                   <a href="javascript:void();">.png</a>
                                   <a href="javascript:void();">.jpeg</a>
                                   <span>allowed</span>
                                </div>
                             </div>
                           </div>
                           <div class="form-group">
                              <label>User Role:</label>
                              <select class="form-control" id="selectuserrole">
                                 <option>Select</option>
                                 <option>Web Designer</option>
                                 <option>Web Developer</option>
                                 <option>Tester</option>
                                 <option>Php Developer</option>
                                 <option>Ios Developer </option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="furl">Facebook Url:</label>
                              <input type="text" class="form-control" id="furl" placeholder="Facebook Url">
                           </div>
                           <div class="form-group">
                              <label for="turl">Twitter Url:</label>
                              <input type="text" class="form-control" id="turl" placeholder="Twitter Url">
                           </div>
                           <div class="form-group">
                              <label for="instaurl">Instagram Url:</label>
                              <input type="text" class="form-control" id="instaurl" placeholder="Instagram Url">
                           </div>
                           <div class="form-group">
                              <label for="lurl">Linkedin Url:</label>
                              <input type="text" class="form-control" id="lurl" placeholder="Linkedin Url">
                           </div>
                        </form>
                     </div>
                  </div>
            </div> -->
            <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Admin User Information</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form action='user_submit.php' method="POST">
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="fname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lname">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add1">Contact Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label>Role:</label>
                                    <select class="form-control" id="role" name="role" required>
                                       <option value=''>Select Role</option>
                                       <option value='1'>Super Admin</option>
                                       <option value='2'>Admin</option>
                                    </select>
                                 </div>
                                <!--  <div class="form-group col-md-6">
                                    <label for="add2">Street Address 2:</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Street Address 2">
                                 </div> 
                                 <div class="form-group col-md-12">
                                    <label for="cname">Company Name:</label>
                                    <input type="text" class="form-control" id="cname" placeholder="Company Name">
                                 </div> 
                                 
                                  <div class="form-group col-md-6">
                                    <label for="mobno">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobno" placeholder="Mobile Number">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="altconno">Alternate Contact:</label>
                                    <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="pno">Pin Code:</label>
                                    <input type="text" class="form-control" id="pno" placeholder="Pin Code">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="city">Town/City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Town/City">
                                 </div> -->
                              </div>
                              <hr>
                              <h5 class="mb-3">Security</h5>
                              <div class="row">
                                 <!-- <div class="form-group col-md-12">
                                    <label for="uname">User Name:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="User Name">
                                 </div> -->
                                 <div class="form-group col-md-6">
                                    <label for="pass">Password:</label>
                                    <input type="text" class="form-control" id="pass" name='pass' placeholder="Password" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for=""></label>
                                    <br/>
                                    <input type="button" class="btn btn-info mb-3" id="gnpass"  value='Generate Password'  onclick="generatePassword()">
                                 </div>  
                              </div>
                             <!--  <div class="checkbox">
                                 <label><input class="mr-2" type="checkbox">Enable Two-Factor-Authentication</label>
                              </div> -->
                              <button type="submit" class="btn btn-primary" name='add_user'>Add New User</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <script>
   function generatePassword() {
  const length = 6; // Adjust the password length as needed
  const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";

  let password = "";
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    password += charset.charAt(randomIndex);   

  }

  // Copy the generated password to the input field
  const passwordInput = document.getElementById("pass");
  passwordInput.value = password;
}


</script>
   <!-- Wrapper END -->
    <!-- Footer -->
       <?php include('inc/footer.php');?>
      <!-- Footer END -->
       
    <!-- Optional JavaScript -->
       <?php include('inc/load_javascript.php');?>

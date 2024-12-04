<?php 
   $pageName = 'List of Admin Users';
   $breadCrumbs = 'List of Admin Users';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
   //require('book_list_data.php');

 
if(isset($_REQUEST['msg']))
{
   if($_REQUEST['msg'] == 'success')
   {
      echo '<script> alert("User Data Updated Successfully");</script>';
   }

   else if($_REQUEST['msg'] == 'err')
   {
      echo '<script> alert("User Data Updation Failed");</script>';
   }
    
}


   $adminList = mysqli_query($connect,"SELECT * FROM admin_user");

   ?>
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><?php echo $pageName;?></h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="add_user.php" class="btn btn-primary">Add New Admin</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <div class="table-responsive">
                              <table id="datatable" class="data-tables table table-striped table-bordered"  style="width:100%">
                                 <thead>
                                    <tr>
                                       <th style="width: 10%;">Sl No</th>
                                       <th style="width: 15%;">First Name</th>
                                       <th style="width: 15%;">Last Name</th>
                                       <th style="width: 20%;">Email</th>
                                       <th style="width: 10%;">Mobile</th>
                                       <th style="width: 15%;">Role</th>
                                       <th style="width: 5%;">Status</th>
                                       <th style="width: 10%;">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    if(mysqli_num_rows($adminList) > 0){
                                        $i=1;
                                    while($admin = mysqli_fetch_assoc($adminList)){
                                    
                                    if($admin['role'] == 1) {$role = 'Super Admin';} else  if($admin['role'] == 2) {$role = 'Admin';}
                                    if($admin['status'] == 1) {$status = 'Active';} else  if($admin['status'] == 2) {$status = 'Inactive';}

                                    ?>
                                    <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $admin['fname'];?></td>
                                    <td><?php echo $admin['lname'];?></td>
                                    <td><?php echo $admin['email'];?></td>
                                    <td><?php echo $admin['phone'];?></td>
                                    <td><?php echo $role;?></td>
                                    <td><?php echo $status;?></td>
                                    
                                    <td>
                                        <!-- <a href="view_book.php?id=${doc.id}"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>&nbsp;&nbsp;&nbsp; -->
                                        <a href="edit_user.php?id=<?php echo $admin['uid'];?>"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>&nbsp;&nbsp;&nbsp;
                    <!-- <i class="fa fa-trash" aria-hidden="true" title="Delete" onclick="confirmDelete('${doc.id}')"></i>--></td> </tr>
                <?php $i++; }  }  else {?>
                    <td colspan="7"> No Records found !</td>
                    <?php } ?>
 
                                    
                                 </tbody>
                                 <!-- <tfoot>
                                    <tr>
                                       <th>Name</th>
                                       <th>Position</th>
                                       <th>Office</th>
                                       <th>Age</th>
                                       <th>Start date</th>
                                       <th>Salary</th>
                                    </tr>
                                 </tfoot> -->
                              </table>





                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
       <!-- Footer -->
      <?php include('inc/footer.php');?>
      <?php include('inc/load_javascript.php');?>
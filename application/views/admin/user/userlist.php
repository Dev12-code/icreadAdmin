<?php
use UI\Size;
$user_id= $this->session->userdata('user_id');

if(!$user_id){
	redirect(route('admin.auth.login'));
}
$users = $users;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Ice Red</title>
      
      <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.ico" />
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/libs.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/socialv.css?v=4.0.0">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome-line-awesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      
  </head>

 
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <?php include __DIR__ . '/../header.php';?>

<div class="container">
   <div class="row">   
      <div class="col-sm-12">
         <div class="tab-content">    
            <div >
               <div class="card">
                  <div class="card-body">
                     <h2>Users</h2>
                     <div class="friend-list-tab mt-2">
                        <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                           <li>
                           <a class="nav-link active" data-bs-toggle="pill" href="#pill-all-friends" data-bs-target="#all-friends">All Users</a>
                           </li>
                           <li>
                              <a class="nav-link" data-bs-toggle="pill" href="#pill-recently-add" data-bs-target="#recently-add">Users(Level 1)</a>
                           </li>
                           <li>
                              <a class="nav-link" data-bs-toggle="pill" href="#pill-closefriends" data-bs-target="#closefriends"> Users (Level 2)</a>
                           </li>
                           <li>
                              <a class="nav-link" data-bs-toggle="pill" href="#pill-home" data-bs-target="#home-town"> Users Level(3)</a>
                           </li>
                           <li>
                              <a class="nav-link" data-bs-toggle="pill" href="#pill-following" data-bs-target="#following">Alias Users</a>
                           </li>
                           <li>
                              <a class="nav-link" data-bs-toggle="pill" href="#pill-blocked" data-bs-target="#blocked">Blocked Users</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                              <div class="card-body p-0">
                                 <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?>                                       
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>                                    
                                    <?php endfor;?>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="recently-add" role="tabpanel">
                              <div class="card-body p-0">
                              <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?>           
                                       <?php if (!isset($users[$i] ->userLevel)) continue;
                                             if($users[$i]["userLevel"] == 1){
                                      ?>                                      
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>       
                                    <?php };?>                             
                                    <?php endfor;?>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="closefriends" role="tabpanel">
                              <div class="card-body p-0">
                              <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?> 
                                       
                                       <?php if (!isset($users[$i] ->userLevel)) continue;
                                             if($users[$i]["userLevel"] ==2){
                                      ?>      
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                   <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <a class="dropdown-item" href="#">Send Notification</a>
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>      
                                       <?php };?>                                    
                                    <?php endfor;?>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="home-town" role="tabpanel">
                              <div class="card-body p-0">
                              <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?>   
                                       <?php if (isset($users[$i] ->userLevel)) {
                                             if($users[$i]["userLevel"] ==1 ||$users[$i]["userLevel"] ==2   ) continue;

                                       }
                                      ?>                                       
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>    
                                    <?php endfor;?>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="following" role="tabpanel">
                              <div class="card-body p-0">
                              <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?>
                                       <?php if (!isset($users[$i] ->is_alias)) continue;
                                             if($users[$i]["is_alias"]){
                                      ?>                                       
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>              
                                       <?php } ?>                    
                                    <?php endfor;?>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="blocked" role="tabpanel">
                              <div class="card-body p-0">
                              <div class="row">
                                    <?php for($i = 0 ; $i < count($users); $i++):?>  
                                          
                                       <?php if (!isset($users[$i] ->userBlocked)) continue;
                                             if($users[$i]["userBlocked"] ){
                                      ?>                                           
                                       <div class="col-md-6 col-lg-6 mb-3">
                                          <div class="iq-friendlist-block">
                                             <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                <a href="<?php echo route('admin.signups.detail', (string)($users[$i]->_id));?>">
                                                   <?php
                                                      $picURL = base_url()."admin_assets/img/generic-user.png";
                                                      if (!empty($users[$i]['profile_photo_url'])){
                                                         $picURL = $users[$i]['profile_photo_url'];
                                                      }
                                                   ?>
                                                   <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                                   </a>
                                                   <div class="friend-info ms-3">
                                                      <h5><?php if($users[$i]['profile_complete']) echo $users[$i]['first_name'] . $users[$i]['last_name'];?></h5>
                                                      <p class="mb-0"> Followers: <?php echo count($users[$i]['followers']);?></p>
                                                      <p class="mb-0"> Profile Completed: <?php  if($users[$i]['profile_complete']) {echo "True";} else{ echo "False";}?></p>
                                                   </div>
                                                </div>
                                                <div class="card-header-toolbar d-flex align-items-center">
                                                   <div class="dropdown">
                                                      <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                                      <i class="ri-check-line me-1 text-white"></i> Action
                                                      </span>
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                         <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                         <a class="dropdown-item" href="#">Block User</a>                                                   
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>    
                                       <?php };?>                                           
                                    <?php endfor;?>
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
      <!-- <div class="col-sm-12 text-center">
         <img src="<?php echo base_url();?>/assets/images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
      </div> -->
   </div>
</div>
    <!-- Wrapper End-->
    <script src="<?php echo base_url();?>/assets/js/libs.min.js"></script>
    <!-- slider JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/slider.js"></script>
    <!-- masonry JavaScript --> 
    <script src="<?php echo base_url();?>/assets/js/masonry.pkgd.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/enchanter.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/sweetalert.js"></script>
    <!-- app JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/charts/weather-chart.js"></script>
    <script src="<?php echo base_url();?>/assets/js/app.js"></script>
    <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/lottie.js"></script>
    
    <script>
      
      console.log("=====");
      $("#li_forum").addClass('');
      $("#li_users").addClass('active');
   
   </script>   
    <!-- offcanvas start -->
 
    <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
       <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
       </div>
       <div class="offcanvas-body small">
          <div class="d-flex flex-wrap align-items-center">
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/08.png" class="img-fluid rounded mb-2" alt="">
                <h6>Facebook</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/09.png" class="img-fluid rounded mb-2" alt="">
                <h6>Twitter</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/10.png" class="img-fluid rounded mb-2" alt="">
                <h6>Instagram</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/11.png" class="img-fluid rounded mb-2" alt="">
                <h6>Google Plus</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/13.png" class="img-fluid rounded mb-2" alt="">
                <h6>In</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="<?php echo base_url();?>/assets/images/icon/12.png" class="img-fluid rounded mb-2" alt="">
                <h6>YouTube</h6>
             </div>
          </div>
       </div>
    </div>
  </body>
</html>
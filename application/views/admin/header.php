
<?php
use UI\Size;

use function PHPSTORM_META\type;

$user_id= $this->session->userdata('user_id');
$user_name =  $this->session->userdata('user_name');
$profile_pic =  $this->session->userdata('profile_pic');
$picURL = base_url()."admin_assets/img/generic-user.png";
if (!empty($profile_pic)){
    $picURL = $profile_pic;
}
if(!$user_id){
	redirect(route('admin.auth.login'));
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.ico" />
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/libs.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/socialv.css?v=4.0.0">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome-line-awesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/carrousesl.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css//flickity.css">
      <script src="<?php echo base_url();?>/assets/js/flickity.js"></script>
  <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />

  </head>
  <body class="  ">
    <!-- loader Start -->
    
    <!-- Wrapper Start -->
      <div class="iq-sidebar  sidebar-default ">
          <div id="sidebar-scrollbar">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li id = 'li_forum'>
                        <a href="<?php echo route('admin.dashboards.index');?>">
                              <i class="las la-newspaper"></i><span>Forum</span>
                          </a>
                      </li>
                      <li id = 'li_users'>
                         <a href="<?php echo route('admin.signups.index');?>" class=" ">
                             <i class="las la-user"></i><span>Users</span>
                          </a>
                      </li>
                      <li class="" id = 'li_interesting'>
                        <a href="<?php echo route('admin.interesting.index');?>" class=" ">
                                <i class="las la-users"></i><span>Interests</span>
                          </a>
                      </li>
                      <!-- <li class=" ">
                          <a href="../app/todo.html" class=" ">
                              <i class="las la-check-circle"></i><span>Todo</span>
                          </a>
                      </li>
                      <li class=" ">
                         <a href="../dashboard/calendar.html" class=" ">
                             <i class="las la-calendar"></i><span>Calendar</span>
                          </a>
                      </li>
                      <li class=" ">
                          <a href="#mailbox" data-bs-toggle="collapse" class="  collapsed" aria-expanded="false">
                              <i class="ri-mail-line"></i><span>Email</span><i
                                  class="ri-arrow-right-s-line iq-arrow-right"></i>
                          </a>
                          <ul id="mailbox" class="iq-submenu collapse" data-bs-parent="#iq-sidebar-toggle">
                              <li class="">
                                  <a href="../app/email.html"><i class="  ri-inbox-line"></i>Inbox</a>
                              </li>
                              <li class="">
                                  <a href="../app/email-compose.html"><i class="ri-edit-line"></i>Email Compose</a>
                              </li>
                          </ul>
                      </li>                       -->
                  </ul>
                  </nav>
                  <div class="p-5"></div>
              </div>
          </div>
      
              <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex justify-content-between">
                      <a href="<?php echo route('admin.dashboards.index');?>">
                          <img src="<?php echo base_url();?>/assets/images/logo.png" class="img-fluid" alt="">
                          <span>IceRed</span>
                      </a>
                      <div class="iq-menu-bt align-self-center">
                          <div class="wrapper-menu">
                              <div class="main-circle"><i class="ri-menu-line"></i></div>
                          </div>
                      </div>
                  </div>
                  <!-- <div class="iq-search-bar device-search">
                      <form action="#" class="searchbox">
                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                          <input type="text" class="text search-input" placeholder="Search here...">
                      </form>
                  </div> -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav  ms-auto navbar-list">
                         
                           <li class="nav-item dropdown">
                              <a href="#" class="   d-flex align-items-center dropdown-toggle" id="drop-down-arrow" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             
                                  <img src="<?php echo $picURL;?>" class="img-fluid rounded-circle me-3" alt="user">
                                  <div class="caption">
                                      <h6 class="mb-0 line-height"><?php echo $user_name; ?></h6>
                                  </div>
                              </a>
                              <div class="sub-drop dropdown-menu caption-menu" aria-labelledby="drop-down-arrow">
                                  <div class="card shadow-none m-0">
                                       <div class="card-header  bg-primary">
                                          <div class="header-title">
                                              <h5 class="mb-0 text-white"><?php echo $user_name; ?></h5>
                                              <span class="text-white font-size-12">Available</span>
                                          </div>
                                      </div>
                                      <div class="card-body p-0 ">                                        
                                          <div class="d-inline-block w-100 text-center p-3">
                                              <a class="btn btn-primary iq-sign-btn" href="<?php echo route('admin.auth.logout');?>" role="button">Sign
                                                  out<i class="ri-login-box-line ms-2"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>               
                  </div>
              </nav>
          </div>
      </div>          
  </body>
</html>
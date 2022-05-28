<?php

use phpDocumentor\Reflection\Types\Boolean;
use UI\Size;

use function PHPSTORM_META\type;

$user_id= $this->session->userdata('user_id');

if(!$user_id){
	redirect(route('admin.auth.login'));
}
$posts = $user['posts'];
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
  
    <?php include __DIR__ . '/../header.php';?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body profile-page p-0">
               <div class="profile-header">
                  <div class="position-relative">
                     <img src="<?php echo base_url();?>/assets/images/page-img/profile-bg1.jpg" alt="profile-bg" class="rounded img-fluid">
                     <ul class="header-nav list-inline d-flex flex-wrap justify-end p-0 m-0">
                        <li><a href="#"><i class="ri-pencil-line"></i></a></li>
                        <li><a href="#"><i class="ri-settings-4-line"></i></a></li>
                     </ul>
                  </div>
                  <div class="user-detail text-center mb-3">
                     <div class="profile-img">
                        <?php
                           $picURL = base_url()."admin_assets/img/generic-user.png";
                           if (!empty($user['profile_photo_url'])){
                              $picURL = $user['profile_photo_url'];
                           }
                        ?>
                        <img src="<?php echo $picURL;?>" alt="profile-img" class="avatar-130 img-fluid" />
                     </div>
                     <div class="profile-detail">
                        <h3 class=""><?php echo $user['first_name'] ." ". $user['last_name'];?></h3>
                     </div>
                  </div>
                  <div class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">
                     <div class="social-links">
                        <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                           <li class="text-center pe-3">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/08.png" class="img-fluid rounded" alt="facebook"></a>
                           </li>
                           <li class="text-center pe-3">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/09.png" class="img-fluid rounded" alt="Twitter"></a>
                           </li>
                           <li class="text-center pe-3">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/10.png" class="img-fluid rounded" alt="Instagram"></a>
                           </li>
                           <li class="text-center pe-3">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/11.png" class="img-fluid rounded" alt="Google plus"></a>
                           </li>
                           <li class="text-center pe-3">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/12.png" class="img-fluid rounded" alt="You tube"></a>
                           </li>
                           <li class="text-center md-pe-3 pe-0">
                              <a href="#"><img src="<?php echo base_url();?>/assets/images/icon/13.png" class="img-fluid rounded" alt="linkedin"></a>
                           </li>
                        </ul>
                     </div>
                     <div class="social-info">
                        <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                           <li class="text-center ps-3">
                              <h6>Posts</h6>
                              <p class="mb-0"><?php echo count($posts);?></p>
                           </li>
                           <li class="text-center ps-3">
                              <h6>Followers</h6>
                              <p class="mb-0"><?php echo count($user['followers']);?></p>
                           </li>
                           <!-- <li class="text-center ps-3">
                              <h6>Following</h6>
                              <p class="mb-0">100</p>
                           </li> -->
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body p-0">
               <div class="user-tabing">
                  <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                     <li class="nav-item col-12 col-sm-6 p-0">
                        <a class="nav-link active" href="#pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#timeline" role="button">Timeline</a>
                     </li>
                     <li class="nav-item col-12 col-sm-6 p-0">
                        <a class="nav-link" href="#pills-about-tab" data-bs-toggle="pill" data-bs-target="#about" role="button">About</a>
                     </li>                   
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="tab-content">
            <div class="tab-pane fade show active" id="timeline" role="tabpanel">
               <div class="card-body p-0">
                  <div class="row">                
                  <?php for($i = 0 ; $i < count($posts); $i++):?>        
                     <div class="col-sm-12">
                        <div class="card card-block card-stretch card-height">
                           <div class="card-body">
                              <div class="user-post-data">
                                 <div class="d-flex justify-content-between">
                                    <div class="me-3">
                                    <?php
                                          $picURL = base_url()."admin_assets/img/generic-user.png";
                                          if (!empty($posts[$i]['user']['profile_photo_url'])){
                                             $picURL =  $posts[$i]['user']['profile_photo_url'];
                                          }
                                       ?>
                                       <img class="rounded-circle img-fluid" src="<?php echo $picURL;?>" style = "width:60px;height:60px;">
                                    </div>
                                    <div class="w-100">
                                       <div class="d-flex justify-content-between">
                                          <div class="">
                                             <h5 class="mb-0 d-inline-block"><?php if($posts[$i]['user']['profile_complete']) echo $posts[$i]['user']['first_name'] . $posts[$i]['user']['last_name'];?></h5>
                                             <span class="mb-0 d-inline-block">Add New Post</span>
                                             <p class="mb-0 text-primary"><?php echo date("Y-m-d H:i:s",strtotime($posts[$i]['createdAt']->toDateTime()->format(DATE_RSS).'UTC'));?></p>
                                             
                                          </div>
                                          <div class="card-post-toolbar">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                <i class="ri-more-fill"></i>
                                                </span>
                                                <div class="dropdown-menu m-0 p-0">
                                                   <a class="dropdown-item p-3" href="#">
                                                      <div class="d-flex align-items-top">
                                                         <div class="h4">
                                                            <i class="ri-save-line"></i>
                                                         </div>
                                                         <div class="data ms-2">
                                                            <h6>Save Post</h6>
                                                            <p class="mb-0">Add this to your saved items</p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                   <a class="dropdown-item p-3" href="#">
                                                      <div class="d-flex align-items-top">
                                                         <i class="ri-close-circle-line h4"></i>
                                                         <div class="data ms-2">
                                                            <h6>Hide Post</h6>
                                                            <p class="mb-0">See fewer posts like this.</p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                   <a class="dropdown-item p-3" href="#">
                                                      <div class="d-flex align-items-top">
                                                         <i class="ri-user-unfollow-line h4"></i>
                                                         <div class="data ms-2">
                                                            <h6>Unfollow User</h6>
                                                            <p class="mb-0">Stop seeing posts but stay friends.</p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                   <a class="dropdown-item p-3" href="#">
                                                      <div class="d-flex align-items-top">
                                                         <i class="ri-notification-line h4"></i>
                                                         <div class="data ms-2">
                                                            <h6>Notifications</h6>
                                                            <p class="mb-0">Turn on notifications for this post</p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="mt-3">
                                 <p><?php echo $posts[$i]['body'];?></p>
                              </div>
                              <div class="user-post">
                              
                                    <?php if(count($posts[$i]['attachments']) >0){
                                    ?>     
                                       <div class="gallery js-flickity"
                                             data-flickity-options='{ "wrapAround": false }'>
                                             <?php
                                                   
                                                   for($j = 0 ; $j < count($posts[$i]['attachments']); $j++):                                    

                                                      if($j==0)
                                                      {
                                                         $class="active";
                                                      }
                                                      else
                                                      {
                                                         $class="";
                                                      }
                                                      ?>
                                                      <div class="gallery-cell">
                                                         <?php if($posts[$i]['attachments'][$j]['type'] == 'image'){
                                                         ?>    
                                                            <img src="<?php echo $posts[$i]['attachments'][$j]['data'] ?>" class="img-responsive" style="width:100%,height:100%">

                                                         
                                                         <?php } else{  
                                                               $array = explode("&&thumbnail@@",$posts[$i]['attachments'][$j]['data']);

                                                            ?>
                                                            
                                                               
                                                                     <video
                                                                        id="my-video"
                                                                        class="video-js"
                                                                        controls
                                                                        preload="auto"
                                                                        width="930px"
                                                                        height="600px"
                                                                        poster= "<?php echo $array[1];?>"
                                                                        data-setup="{}"
                                                                     >
                                                                        <source src="<?php echo $array[0];?>" type="video/mp4" />
                                                                        <p class="vjs-no-js">
                                                                           To view this video please enable JavaScript, and consider upgrading to a
                                                                           web browser that
                                                                           <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                                           >supports HTML5 video</a
                                                                           >
                                                                        </p>
                                                                     </video>
               


                                                         <?php };?>     
                                                      </div> 
                                                   
                                                   <?php endfor;?>
                                       </div>
                                    <?php };?>    
                                 </div>
                              <div class="comment-area mt-3">
                                 <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="like-block position-relative d-flex align-items-center">
                                       <div class="d-flex align-items-center">
                                          <div class="like-data">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                <img src="<?php echo base_url();?>/assets/images/icon/01.png" class="img-fluid" alt="">
                                                </span>
                                                <!-- <div class="dropdown-menu py-2">
                                                   <a class="ms-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Like"><img src="<?php echo base_url();?>/assets/images/icon/01.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="Love"><img src="<?php echo base_url();?>/assets/images/icon/02.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="Happy"><img src="<?php echo base_url();?>/assets/images/icon/03.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="HaHa"><img src="<?php echo base_url();?>/assets/images/icon/04.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="Think"><img src="<?php echo base_url();?>/assets/images/icon/05.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="Sade" ><img src="<?php echo base_url();?>/assets/images/icon/06.png" class="img-fluid" alt=""></a>
                                                   <a class="me-2" href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="Lovely"><img src="<?php echo base_url();?>/assets/images/icon/07.png" class="img-fluid" alt=""></a>
                                                </div> -->
                                             </div>
                                          </div>
                                          <div class="total-like-block ms-2 me-3">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                <?php echo count($posts[$i]['likes'])?> Likes
                                                </span>
                                                <!-- <div class="dropdown-menu">
                                                   <a class="dropdown-item" href="#">Max Emum</a>
                                                   <a class="dropdown-item" href="#">Bill Yerds</a>
                                                   <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                   <a class="dropdown-item" href="#">Tara Misu</a>
                                                   <a class="dropdown-item" href="#">Midge Itz</a>
                                                   <a class="dropdown-item" href="#">Sal Vidge</a>
                                                   <a class="dropdown-item" href="#">Other</a>
                                                </div> -->
                                             </div>
                                          </div>
                                       </div>
                                       <div class="total-comment-block">
                                          <div class="dropdown">
                                             <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                             <?php echo count($posts[$i]['comments'])?> Comment
                                             </span>
                                             <!-- <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Max Emum</a>
                                                <a class="dropdown-item" href="#">Bill Yerds</a>
                                                <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                <a class="dropdown-item" href="#">Tara Misu</a>
                                                <a class="dropdown-item" href="#">Midge Itz</a>
                                                <a class="dropdown-item" href="#">Sal Vidge</a>
                                                <a class="dropdown-item" href="#">Other</a>
                                             </div> -->
                                          </div>
                                       </div>
                                    </div>
                                    <!-- <div class="share-block d-flex align-items-center feather-icon mt-2 mt-md-0">
                                       <a href="javascript:void();" data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn"><i class="ri-share-line"></i>
                                       <span class="ms-1">99 Share</span></a>                           
                                    </div> -->
                                 </div>
                                 <hr>
                                 <ul class="post-comments list-inline p-0 m-0">
                                    <?php for($j = 0 ; $j < count($posts[$i]['comments']); $j++):?>        
                                       <?php
                                          $margin = '0px';
                                          if ($posts[$i]['comments'][$j]['level'] == 1){
                                             $margin = '30px';
                                          }
                                       ?>
                                       <li class="mb-2" style="padding-left: <?php echo $margin; ?>;">
                                          <div class="d-flex">
                                             <div class="user-img">
                                                <?php
                                                   $picURL = base_url()."admin_assets/img/generic-user.png";
                                                   if (!empty($posts[$i]['comments'][$j]['user']['profile_photo_url'])){
                                                      $picURL = $posts[$i]['comments'][$j]['user']['profile_photo_url'];
                                                   }
                                                ?>
                                                <img src="<?php echo $picURL;?>" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                             </div>
                                             <div class="comment-data-block ms-3">
                                                <h6><?php echo $posts[$i]['comments'][$j]['user']['first_name'] . $posts[$i]['comments'][$j]['user']['last_name'];?></h6>
                                                <p class="mb-0"><?php echo $posts[$i]['comments'][$j]['comment'];?></p>
                                                <div class="d-flex flex-wrap align-items-center comment-activity">
                                                   <a href="javascript:void();">like</a>
                                                   <a href="javascript:void();">reply</a>
                                                   <span><?php echo date("Y-m-d H:i:s",strtotime($posts[$i]['comments'][$j]['createdAt']->toDateTime()->format(DATE_RSS).'UTC'));?> </span>
                                                </div>
                                             </div>
                                          </div>
                                       </li>     
                                    <?php endfor;?>
                              
                                 </ul>
                                 <!-- <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                    <input type="text" class="form-control rounded" placeholder="Enter Your Comment">
                                    <div class="comment-attagement d-flex">
                                       <a href="javascript:void();"><i class="ri-link me-3"></i></a>
                                       <a href="javascript:void();"><i class="ri-user-smile-line me-3"></i></a>
                                       <a href="javascript:void();"><i class="ri-camera-line me-3"></i></a>
                                    </div>
                                 </form> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endfor;?>

                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="about" role="tabpanel" >
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-3">
                           <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                              <li>
                                 <a class="nav-link active" href="#v-pills-basicinfo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basicinfo-tab" role="button">Contact and Basic Info</a>
                              </li>
                              <!-- <li>
                                 <a class="nav-link" href="#v-pills-family-tab" data-bs-toggle="pill" data-bs-target="#v-pills-family" role="button">Family and Relationship</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="#v-pills-work-tab" data-bs-toggle="pill" data-bs-target="#v-pills-work-tab" role="button">Work and Education</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="#v-pills-lived-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lived-tab" role="button">Places You've Lived</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="#v-pills-details-tab" data-bs-toggle="pill" data-bs-target="#v-pills-details-tab" role="button">Details About You</a>
                              </li> -->
                           </ul>
                        </div>
                        <div class="col-md-9 ps-4">
                           <div class="tab-content" >
                              <div class="tab-pane fade active show" id="v-pills-basicinfo-tab" role="tabpanel"  aria-labelledby="v-pills-basicinfo-tab">
                                 <h4>Contact Information</h4>
                                 <hr>
                                 <div class="row">
                                    <!-- <div class="col-3">
                                       <h6>Email</h6>
                                    </div>
                                    <div class="col-9">
                                       <p class="mb-0"><?php echo $user['']?></p>
                                    </div> -->
                                    <div class="col-3">
                                       <h6>Mobile</h6>
                                    </div>
                                    <div class="col-9">
                                       <p class="mb-0">+(<?php echo $user['phone_country_code']?>) <?php echo $user['phone']?></p>
                                    </div>
                                    <div class="col-3">
                                       <h6>Address</h6>
                                    </div>
                                    <div class="col-9">
                                       <p class="mb-0"><?php echo $user['location']?></p>
                                    </div>
                                    <!-- <div class="col-3">
                                       <h6>Phone Verification</h6>
                                    </div>
                                    <div class="col-9">
                                       <p class="mb-0"><?php echo (Boolean)($user['phone_verified'])?></p>
                                    </div> -->
                                 </div>                                
                              </div>
                              <div class="tab-pane fade" id="v-pills-family" role="tabpanel">
                                 <h4 class="mb-3">Relationship</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="media-support-info ms-3">
                                          <h6>Add Your Relationship Status</h6>
                                       </div>
                                    </li>
                                 </ul>
                                 <h4 class="mt-3 mb-3">Family Members</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="media-support-info ms-3">
                                          <h6>Add Family Members</h6>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex justify-content-between">
                                             <div class="ms-3">
                                                <h6>Paul Molive</h6>
                                                <p class="mb-0">Brothe</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex justify-content-between mb-4  align-items-center">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class=" ms-3">
                                                <h6>Anna Mull</h6>
                                                <p class="mb-0">Sister</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex justify-content-between">
                                             <div class="ms-3">
                                                <h6>Paige Turner</h6>
                                                <p class="mb-0">Cousin</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="tab-pane fade" id="v-pills-work-tab" role="tabpanel" aria-labelledby="v-pills-work-tab">
                                 <h4 class="mb-3">Work</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex justify-content-between mb-4  align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="ms-3">
                                          <h6>Add Work Place</h6>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex justify-content-between">
                                             <div class="ms-3">
                                                <h6>Themeforest</h6>
                                                <p class="mb-0">Web Designer</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class="ms-3">
                                                <h6>iqonicdesign</h6>
                                                <p class="mb-0">Web Developer</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class="ms-3">
                                                <h6>W3school</h6>
                                                <p class="mb-0">Designer</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                                 <h4 class="mb-3">Professional Skills</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="ms-3">
                                          <h6>Add Professional Skills</h6>
                                       </div>
                                    </li>
                                 </ul>
                                 <h4 class="mt-3 mb-3">College</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="ms-3">
                                          <h6>Add College</h6>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class="ms-3">
                                                <h6>Lorem ipsum</h6>
                                                <p class="mb-0">USA</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="tab-pane fade" id="v-pills-lived-tab" role="tabpanel" aria-labelledby="v-pills-lived-tab">
                                 <h4 class="mb-3">Current City and Hometown</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class="ms-3">
                                                <h6>Georgia</h6>
                                                <p class="mb-0">Georgia State</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center justify-content-between">
                                       <div class="user-img img-fluid"><img src="<?php echo base_url();?>/assets/images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                       <div class="w-100">
                                          <div class="d-flex flex-wrap justify-content-between">
                                             <div class="ms-3">
                                                <h6>Atlanta</h6>
                                                <p class="mb-0">Atlanta City</p>
                                             </div>
                                             <div class="edit-relation"><a href="#"><i class="ri-edit-line me-2"></i>Edit</a></div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                                 <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                 <ul class="suggestions-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                       <div class="ms-3">
                                          <h6>Add Place</h6>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="tab-pane fade" id="v-pills-details-tab" role="tabpanel" aria-labelledby="v-pills-details-tab">
                                 <h4 class="mb-3">About You</h4>
                                 <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.</p>
                                 <h4 class="mt-3 mb-3">Other Name</h4>
                                 <p>Bini Rock</p>
                                 <h4 class="mt-3 mb-3">Favorite Quotes</h4>
                                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
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
</div>
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
    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

    <script>
      
      console.log("=====");
      $("#li_forum").addClass('');
      $("#li_users").addClass('active');
   
   </script>   
   
  </body>
</html>
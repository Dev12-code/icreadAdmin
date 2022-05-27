<?php
use UI\Size;

use function PHPSTORM_META\type;

$user_id= $this->session->userdata('user_id');

if(!$user_id){
	redirect(route('admin.auth.login'));
}
$posts = $posts;
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>IceRed</title>
      
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

    <?php include 'header.php';?>
<div class="container">
   <div class="row">
      <div class="">
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

                                             <?php } else{?>
                                                   <iframe  src="<?php echo $posts[$i]['attachments'][$j]['data'] ?>" allowfullscreen  style="width:100%,height:100%"></iframe>

                                             <?php };?>     
                                          </div> 
                                       
                                       <?php endfor;?>
                                 </div>                          
                           </div>
                         <?php };?>     



                     <!-- <div class=" d-grid grid-rows-2 grid-flow-col gap-3">
                        <div class="row-span-2 row-span-md-1">
                           <img src="<?php echo base_url();?>/assets/images/page-img/p2.jpg" alt="post-image" class="img-fluid rounded w-100">
                        </div>
                        <div class="row-span-1">
                           <img src="<?php echo base_url();?>/assets/images/page-img/p1.jpg" alt="post-image" class="img-fluid rounded w-100">
                        </div>
                        <div class="row-span-1 ">
                           <img src="<?php echo base_url();?>/assets/images/page-img/p3.jpg" alt="post-image" class="img-fluid rounded w-100">
                        </div>
                     </div> -->
                     <!-- <div class="user-post">
                     <a href="javascript:void();"><img src="<?php echo base_url();?>/assets/images/page-img/p4.jpg" alt="post-image" class="img-fluid rounded w-100"></a>
                  </div> -->
                 
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
      
      <!-- <div class="col-sm-12 text-center">
         <img src="<?php echo base_url();?>/assets/images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
      </div> -->
   </div>
</div>
</div>
</div>
   
   
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
      $("#li_forum").addClass('active');
      $("#li_users").addClass('');
   
   </script>   
    <!-- offcanvas start -->
 
    
  </body>
</html>
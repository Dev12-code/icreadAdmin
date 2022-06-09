<?php
use UI\Size;
$user_id= $this->session->userdata('user_id');

if(!$user_id){
	redirect(route('admin.auth.login'));
}

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
            <div class="card">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center flex-wraps">
                        <h2>Interests</h2>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" >Create Interest</button>
                        <!-- Modal -->
                        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Interest</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                                    </button>
                                 </div>                                 
                                 <div class="modal-body">
                                    <form method="get" enctype="multipart/form-data">         
                                       <div class="form-group row">
                                          <input type="file" name="receipt" id="receipt" class="form-control" onchange="readURL(this,'edit');">
                                          <input type="hidden" name="receipt_name" id="receipt_name" class="form-control">
                                       </div>
                                       <div class="form-group row">
                                          <label for="subject" class="col-sm-2 col-form-label">Title:</label>
                                          <div class="col-sm-10">
                                                <input type="text"  id="subject" class="form-control">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="subject" class="col-sm-2 col-form-label">Content:</label>
                                          <div class="col-md-10">
                                                <textarea class="textarea form-control" rows="5"></textarea>
                                          </div>
                                       </div>                                      
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
                     <div class="card-body p-0">
                        <div class="row">
                           <?php for($i = 0 ; $i < count($interestings); $i++):?>                                       
                              <div class="col-md-6 col-lg-6 mb-3">
                                 <div class="iq-friendlist-block">
                                    <div class="d-flex align-items-center justify-content-between">
                                       <div class="d-flex align-items-center">
                                       <a href="">
                                          <?php
                                             $picURL = base_url()."assets/images/logo.png";
                                             if (!empty($interestings[$i]['image_url'])){
                                                $picURL = $interestings[$i]['image_url'];
                                             }
                                          ?>
                                          <img src="<?php echo $picURL;?>" style = "width:130px;height:130px;padding:10px">
                                          </a>
                                          <div class="friend-info ms-3">
                                             <h5><?php echo $interestings[$i]['label'] ;?></h5>
                                             <p class="mb-0"> <?php  echo $interestings[$i]['description'];?></p>
                                          </div>
                                       </div>
                                       <div class="card-header-toolbar d-flex align-items-center">
                                          <div class="dropdown">
                                             <span class="dropdown-toggle btn btn-secondary me-2" id="dropdownMenuButton01" data-bs-toggle="dropdown" aria-expanded="true" role="button">
                                             <i class="ri-check-line me-1 text-white"></i> Action
                                             </span>
                                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                <!-- <a class="dropdown-item" href="#">Send Notification</a> -->
                                                <a class="dropdown-item" href="#">Remove Interest</a>          
                                                <a class="dropdown-item" href="#">Edit Interest</a>                                                   
                                         
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
      $("#li_users").addClass('');
      $("#li_interesting").addClass('active');
      function readURL(input, type) {
            var doc_file = $("#receipt").prop("files")[0];
            var form_data = new FormData();
            form_data.append("file_name", doc_file)
            form_data.append("file_type", "receipt")
            $.ajax({
               url: '<?php echo base_url(); ?>admin/interesting/doUpload',
               dataType: 'json',
               cache: false,
               contentType: false,
               processData: false,
               data: form_data,
               type: 'post',
               async: false,
               success: function(data) {
               var image_name = data['file_name'];
               var image_url = data['file_url'];
             
               $("#receipt_name").val(image_name);
               if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                     $('#blashE').attr('src', e.target.result).width(120).height(120);
                  };
                  reader.readAsDataURL(input.files[0]);
               }
               },
               error: function(data) {
                  // alert(JSON.stringify(data));
               }
            });
  }

   
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
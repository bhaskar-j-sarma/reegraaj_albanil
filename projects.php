<?php include_once('header.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../css/style.css?vs=2">
<link rel="stylesheet" href="../css/responsive.css?vs=1">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<?php 
    include_once("class/fetch_data.php");
    $product_description=new fetch_data();
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $url = $uri_segments[2];
?>
<?php 
    $sql=$product_description->get_project_data($url);
    while($row=mysqli_fetch_array($sql))
    {
?>
<section class="page-title" style="background: url(../admin/blogs_images/<?= $row['tbumb_image'] ?>);">
    <div class="container">
        <div class="title-text text-center">
            <div class="logo"><a href="../"><img src="../images/RDS.jpg" alt="" title="" style="max-width: 157px;"></a></div><br>
            <h3><?= $row['project_name'] ?></h3>
            <ul>
                <li><a href="../"><i class="fa fa-check"></i> <?= $row['project_quote'] ?></a></li>
            </ul>
        </div>                
    </div>
</section>
<section class="fact-counter-area">
    <div class="container">
        <div class="sec-title-two text-center">
            <h6 class="about-text"><?= $row['description'] ?></h6>
            <?php
                if($row['project_category'] == 'Ongoing Projects'){
                    echo "<a href='' data-toggle='modal' data-target='#staticBackdrop' class='theme-btn btn-style-three'>Book Now</a>";
                }else{
                    echo "<div class='alert alert-danger' role='alert'>This properties are sold out.</div>";
                }
            ?>      
        </div>
    </div>
</section>
<?php } ?>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Book your flat now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="email" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="number" class="form-control" id="phone" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_data" class="btn btn-primary">SUBMIT</button>
      </div>
    </div>
  </div>
</div>
<section class="news-section three">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="blog-item-one three">
                    <div class="image-text">
                        <div class="blog-testimonials">
                            <div class="testimonial-carousel2 owl-carousel owl-theme">
                                <?php 
                                    $sql_image=$product_description->get_single_project_images($url);
                                    while($row_image=mysqli_fetch_array($sql_image))
                                    {
                                ?>
                                <div class="testimonials-item-three text-center">
                                    <img src="../admin/blogs_images/<?= $row_image['image'] ?>" alt="">
                                </div>
                                <?php } ?>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12">
                <div class="blog-right-area">
                    <?php
                        $sql_architect=$product_description->get_architects1($url);
                        while($row_architect=mysqli_fetch_array($sql_architect))
                            {
                    ?>
                    <div class="blog-right-title">
                        <h6>ARCHITECT'S NOTE</h6>
                    </div>
                    <div class="shedule-image-box text-center">
                        <figure>
                            <img src="../admin/blogs_images/<?= $row_architect['architect_image'] ?>" alt="">
                        </figure>
                        <h5><?= $row_architect['architect_name'] ?></h5>
                        <a href="#"><p><?= $row_architect['architect_message'] ?></p></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news-section three">
    <div class="container-fluid">
        <div class="sec-title-two text-center">
                <h2>Features</h2>
            </div>
        <div class="row">
            <?php
                $sql_features=$product_description->get_features($url);
                while($row_features=mysqli_fetch_array($sql_features))
                    {
            ?>
            <div class="col-md-4">
                <div class="blog-comment-area">
                    <div class="image-box">
                        <h6><?= $row_features['feature_icon'] ?></h6>
                    </div>
                    <div class="image-content">
                        <p><?= $row_features['feature_tittle'] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="news-section three">
    <div class="container">
        <div class="sec-title-two text-center">
                <h2>Amenities</h2>
            </div>
        <div class="row">
            <?php
                $sql_features=$product_description->get_amenities($url);
                while($row_ammenities=mysqli_fetch_array($sql_features))
                    {
            ?>
            <div class="col-xs-6 col-md-3 amedities">
                <i class="fa fa-check"></i><hr>
                <p><?= $row_ammenities['amenities_title'] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
    $sql_location=$product_description->get_location1($url);
    while($row_location=mysqli_fetch_array($sql_location))
        {
?>
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 mt-3 mt-md-0 mb-0">
                <div class="about-image">
                    <figure>
                        <img class="img-fluid" src="../admin/blogs_images/<?= $row_location['location_image'] ?>" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-md-4 col-12 mt-md-0 mt-0 py-md-4 py-0 px-4 px-md-3">
                <div class="position-relative shadow my-md-0 my-0 p-md-4 p-2 bg-white right-lapbox">
                    <p class="about-side-text text-dark text-center"><?= $row_location['location_desc'] ?></p>
                    <div class="about-info text-center">
                        <a target="_blank" href="<?= $row_location['location_glink'] ?>" class="theme-btn btn-style-three">View on Google Map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<footer class="main-footer">
    <div class="container">
        <div class="footer-area text-center">
            <ul class="footer-menu">
                <li><a href="http://reegraajalbanil.com/">Home</a></li>
                <li><a href="http://reegraajalbanil.com/about">About</a></li>
                <li><a href="http://reegraajalbanil.com/completed-projects/">Completed Projects</a></li>
                <li><a href="http://reegraajalbanil.com/ongoing-projects/">Ongoing Projects</a></li>
                <li><a href="http://reegraajalbanil.com/upcoming-projects/">Upcomming Projects</a></li>
                <li><a href="http://reegraajalbanil.com/contact-us/">Contact Us</a></li>
            </ul>
        </div>            
    </div>
</footer>
<section class="footer-bottom">
    <div class="container">
        <div class="copyright-text text-center">
            Copyright &copy; <a href="#">Reegraaj</a> 2020. All Rights Reserved
        </div>
    </div>
</section>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.js"></script>
<script src="../js/owl.js"></script>
<script src="../js/wow.js"></script>
<script src="../js/jquery.countTo.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/appear.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/isotope.js"></script>
<script src="../js/bxslider.js"></script>
<script src="../js/validate.js"></script>
<script src="../js/custom.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#submit_data").click(function(){
            var name=$("#name").val();
            var email=$("#email").val();
            var phone=$("#phone").val();
            if(name == '' || email == '' || phone == '') 
            {  
                swal("Oops!","Please fill the menditory filled.","error");
            }
            else{
                $.ajax({
                    url:'../webservices/add_contact_data.php',
                    method:'POST',
                    data:{
                        name:name,
                        email:email,
                        phone:phone
                    },
                    success:function(data){
                        swal("Done!","Our marketing executive contact you soon.","success");
                        $(document).ready(function () {
                            setTimeout(function(){
                                location.reload(true);
                            }, 2000);       
                        });
                    }
                });
            }
        });
    });
</script>
<?php include_once('header.php'); ?>
<?php 
    include_once("class/fetch_data.php");
    $homepage=new fetch_data();
?>
<section class="main-slider">   
    <div class="main-slider-carousel owl-carousel owl-theme">     
        <div class="slide" style="background-image:url(admin/blogs_images/BlogImage160312620720201019.jpg)">
            <div class="container">
                <div class="content">
                    <h3>Booking going on</h3>
                    <h2>Reeg Premises Block C</h2>
                    <div class="text">Hurry Up !! <br>Book your dream flat now</div>
                    <div class="link-box">
                        <a href="https://reegraajalbanil.com/projects.php/reeg-premises-block-c" class="theme-btn btn-style-three">Book Now</a>
                    </div>
                </div>
            </div>
        </div> 
        <div class="slide" style="background-image:url(admin/blogs_images/BlogImage160312620720201019.jpg)">
            <div class="container">
                <div class="content">
                    <h3>Booking going on</h3>
                    <h2>Reeg Premises Block C</h2>
                    <div class="text">Hurry Up !! <br>Book your dream flat now</div>
                    <div class="link-box">
                        <a href="https://reegraajalbanil.com/projects.php/reeg-premises-block-c" class="theme-btn btn-style-three">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" style="background-image:url(admin/blogs_images/BlogImage160312620720201019.jpg)">
            <div class="container">
                <div class="content">
                    <h3>Booking going on</h3>
                    <h2>Reeg Premises Block C</h2>
                    <div class="text">Hurry Up !! <br>Book your dream flat now</div>
                    <div class="link-box">
                        <a href="https://reegraajalbanil.com/projects.php/reeg-premises-block-c" class="theme-btn btn-style-three">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!--End Main Slider-->
<?php
    $sql=$homepage->get_latest_project();
    while($row=mysqli_fetch_array($sql))
        {
?>
<section class="about-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-12">
                <img class="img-fluid" src="admin/blogs_images/<?= $row['tbumb_image'] ?>" alt="">
            </div>
            <div class="col-md-4 col-12 mt-md-0 mt-0 py-md-4 py-0 px-4 px-md-3">
                <div class="position-relative shadow my-md-0 my-0 p-md-4 p-2 bg-white right-lapbox">
                    <h4 class="text-center">
                        <img src="images/RDS.jpg" style="width: 25%;">
                    </h4>
                    <h3 class="text-dark text-center"><?= $row['project_name'] ?></h3>
                    <p class="about-side-text text-dark text-center"><?= substr($row['description'], 0, 250) ?>...</p>
                    <div class="about-info text-center">
                        <a href="projects.php/<?= $row['url'] ?>" class="theme-btn btn-style-three">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!--Fact Counter Area-->
<section class="fact-counter-area" style="background:black;">
    <div class="container">
        <div class="sec-title-two text-center">
            <h2 style="color: white;">About <span>Us</span></h2>
            <h6 class="about-text">We believe a house is not mere bricks and mortar. Neither is it a place where you just live encased in four walls. We believe in homes. The special place that helps you discover the real you. Your life's focal point beckoning you time and again. Our aim is to partner you in this art of homemaking. Since inception in 2010, we have been creating home and workspaces with a difference, to make good living affordable in Guwahati.</h6><br>
            <a href="about" class="theme-btn btn-style-two">Read More</a>
        </div>
    </div>
</section>
<section class="about-section two three">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-md-12 col-sm-12">
                <div class="about-text">
                    <div class="sec-title">
                        <div class="sec-title-three float-left">
                            <h2>" There are some more Heavenly Homes Coming Soon made by the Same Creator of<br><span> Reegraaj Albanil Pvt. Ltd.</span>"</h2>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-xl-5 col-md-12 col-sm-12">
                <div class="about-image float-right" style="text-align:right;">
                    <figure>
                        <img src="images/heavenly.jpg" style="max-width: 70%;">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="team-section">
    <div class="container-fluid text-center">
        <div class="sec-title-two text-center">
            <h2>Upcomming <span>Projects</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Team Block -->
            <?php 
                $sql=$homepage->get_upcomming_lim();
                while($row=mysqli_fetch_array($sql))
                    {
            ?>
            <div class="team-block col-md-3 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="admin/blogs_images/<?= $row['tbumb_image'] ?>" alt=""></figure>
                    </div>
                    <div class="info-box">
                        <h4 class="name"><a href="#"><?= $row['project_name'] ?></a></h4>
                        <a target="_blank" href="<?= $row['location_glink'] ?>" class="theme-btn btn-style-three">View Location</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="upcoming-projects" class="theme-btn btn-style-three">View All</a>
    </div>
</section>
<section class="team-section">
    <div class="container-fluid text-center">
        <div class="sec-title-two text-center">
            <h2>Completed <span>Projects</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Team Block -->
            <?php 
                $sql=$homepage->get_completed_lim();
                while($row=mysqli_fetch_array($sql))
                    {
            ?>
            <div class="team-block col-md-3 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="admin/blogs_images/<?= $row['tbumb_image'] ?>" alt=""></figure>
                    </div>
                    <div class="info-box">
                        <h4 class="name"><a href="#"><?= $row['project_name'] ?></a></h4>
                        <a href="projects.php/<?= $row['url'] ?>" class="theme-btn btn-style-three">View More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="http://reegraajalbani.com/completed-projects" class="theme-btn btn-style-three">View All</a>
    </div>
</section>
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
<section class="gallery-bottom">
    <div class="container clearfix">
        <div class="sec-title-three float-left">
            <h2>Hurry Up !! <br>Book your dream flat now</h2>
        </div>
        <div class="link-btn float-right">
            <a href="#" data-toggle="modal" data-target="#staticBackdrop" class="theme-btn btn-style-two">Book Now</a>
        </div>
    </div>
</section>
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
<!--End Main Footer-->

<!--Footer Bottom Section-->
<section class="footer-bottom">
    <div class="container">
        <div class="copyright-text text-center">
            Copyright &copy; <a href="#">Reegraaj</a> 2020. All Rights Reserved
        </div>
    </div>
</section>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/isotope.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/validate.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Custom script -->
<script src="js/custom.js"></script>
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
                    url:'webservices/add_contact_data.php',
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
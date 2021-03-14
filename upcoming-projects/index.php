<?php include_once('../header.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../css/style.css?vs=2">
<link rel="stylesheet" href="../css/responsive.css?vs=1">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<?php 
    include_once("../class/fetch_data.php");
    $completed_projects=new fetch_data();
?>
<section class="team-section">
    <div class="container-fluid text-center">
        <div class="sec-title-two text-center">
            <h2>Upcoming <span>Projects</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Team Block -->
            <?php 
                $sql=$completed_projects->get_upcomming();
                while($row=mysqli_fetch_array($sql))
                    {
            ?>
            <div class="team-block col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="../admin/blogs_images/<?= $row['tbumb_image'] ?>" alt=""></figure>
                    </div>
                    <div class="info-box">
                        <h4 class="name"><a href="#"><?= $row['project_name'] ?></a></h4>
                        <a href="../projects.php/<?= $row['url'] ?>" class="theme-btn btn-style-three">View More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
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
                        <img src="../images/heavenly.jpg" style="max-width: 70%;">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery-bottom">
    <div class="container clearfix">
        <div class="sec-title-three float-left">
            <h2>Surround yourself with people <br>who sync with you</h2>
        </div>
        <div class="link-btn float-right">
            <a href="#" data-toggle="modal" data-target="#staticBackdrop" class="theme-btn btn-style-two">Book Now</a>
        </div>
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
<footer class="main-footer">
    <div class="container">
        <div class="footer-area text-center">
            <ul class="footer-menu">
                <li><a href="http://reegraajalbanil.com/">Home</a></li>
                <li><a href="http://reegraajalbanil.com/about">About</a></li>
                <li><a href="http://reegraajalbanil.com/completed-projects/">Completed Projects</a></li>
                <li><a href="http://reegraajalbanil.com/ongoing-projects/">Ongoing Projects</a></li>
                <li><a href="http://reegraajalbanil.com/upcoming-projects/">Upcoming Projects</a></li>
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
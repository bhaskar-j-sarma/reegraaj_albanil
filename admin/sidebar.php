<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="home.php">
            <!-- <img class="m-b" alt="logo" src="images/logo1.png" style="width: 100%;height: 100%;"> -->
            </a>
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Admin</span>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <small class="text-muted">Admin<b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                        
                        <li><a href="webservices/ajax_authentication.php?action=doLogOut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="home.php"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right"></span> </a>
            </li>                      
            <li>
                <a href="#"><span class="nav-label">Projects</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="add_projects.php">Add Projects</a></li>
                    <li><a href="manage_projects.php">View Projects</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Contact Data</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="view_review.php">View Reviews</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indian Railways Train Scheduling Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.40.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.40.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/ir-logo4.jpg">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
 
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="Search about any Train...." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.php" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Scheduler </span><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>SD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php?logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/irlogo2.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Rajdeep Gupta</h1>
              <p>Train Scheduler</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"> <a href="index.php"><i class="icon-home"></i>Home</a></li>
            <li> <a href="forms.php"> <i class="icon-padnote"></i>New Train </a></li>
            <!-- <li> <a href="login.php"> <i class="icon-interface-windows"></i>Login Page</a></li> -->
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="col-lg-12">
                <div id='map' style='width: 1000px; height: 400px;'></div> 
                  <div id='console'>
                    <div class='session'>
                      <h3>Congestion</h3>
                      <div class='row colors'>
                      </div>
                      <div class='row labels'>
                        <div class='label'>0</div>
                        <div class='label'>1</div>
                        <div class='label'>2</div>
                        <div class='label'>3</div>
                        <div class='label'>3+</div>
                      </div>
                    </div>
                    <div class='session' id='sliderbar'>
                      <h3>Hour: <label id='active-hour'>12PM</label></h3>
                      <input id='slider' class='row' type='range' min='0' max='23' step='1' value='12' />
                    </div>
                    <!-- <div class='session'>
                      <h3>Day of the week</h3>
                      <div class='row' id='filters'>
                        <input id='Sun' type='checkbox' name='toggle' value='1'checked='checked'>
                        <label for='Sun'>Sun</label>
                        <input id='Mon' type='checkbox' name='toggle' value='2'>
                        <label for='Mon'>Mon</label>
                        <input id='Tue' type='checkbox' name='toggle' value='3'>
                        <label for='Tue'>Tue</label>
                        <input id='Wed' type='checkbox' name='toggle' value='4'>
                        <label for='Wed'>Wed</label>
                        <input id='Thu' type='checkbox' name='toggle' value='5'>
                        <label for='Thu'>Thu</label>
                        <input id='Fri' type='checkbox' name='toggle' value='6'>
                        <label for='Fri'>Fri</label>
                        <input id='Sat' type='checkbox' name='toggle' value='7'>
                        <label for='Sat'>Sat</label>
                      </div>
                    </div> -->
                  </div>
              </div>
            </div>
          </section>
          
          
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by Rajdeep Gupta</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script type="text/javascript" src="js/index.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>

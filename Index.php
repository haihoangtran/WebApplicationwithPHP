<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Team 6 OFHS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Team 6 Website">
    <meta name="author" content="Team 6">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="C:\Users\JCH\Desktop\Index1.html">Team 6 Online Food Help System</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">

                        
               <?php
                    if (!isset($_COOKIE['username'] ) && !isset ($_COOKIE['password']))
                    {
                        ?>
                        <a href="Login.php" class="navbar-link">Log In</a>
              <?php
                    }
                    else
                    {
                        $provider = $_COOKIE['provider'];
                        $user_name = $_COOKIE['username'];
                        if ($provider == 'Yes')
                        {
                            echo 'Loged in as Provider, '.$user_name;
                            ?>
                        <a href="Logout.php" class="navbar-link"> Log Out</a>
               <?php
                        }
                        else
                        {
                            echo 'Loged in as Member, '.$user_name;
                            ?>
                        <a href="Logout.php" class="navbar-link"> Log Out</a>
               <?php
                        }
                    }
               ?>


              
            </p>
            <ul class="nav">
              <li><a>Home</a></li>
              <li><a href="C:\Users\JCH\Desktop\Index2.html">About Us</a></li>
			  <li><a href="Testimonial.php">Testimonials</a></li>
			  <li><a href="C:\Users\JCH\Desktop\Index3.html">Contact Us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	  <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Login:</li>
              <li><a href="#">User</a></li>
			  <li><a href="#">Health Expert</a></li>
            </ul>
          </div><!--/.well -->
		  <img src="NewUHLogo.jpg">
        </div><!--/span-->

        <div class="span9">
          <div class="hero-unit">
            <h1>Welcome to the Team 6 Online Food Help System Homepage!</h1>
            <p>We are glad you have made the decision to stop by.</p>
            <p><a class="btn btn-primary btn-large", href="C:\Users\JCH\Desktop\Index2.html">Learn more about us &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <!--<h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>-->
			  <img src="doctor.jpg">
            </div><!--/span-->
            <div class="span4">
              <!--<h2>Heading</h2>-->
              <!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>-->
			  <img src="NewUHCougar.jpg">
            </div><!--/span-->
            <div class="span4">
              <!--<h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>-->
			  <img src="exercise.jpg">
            </div><!--/span-->
          </div><!--/row-->
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Team 6 Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>

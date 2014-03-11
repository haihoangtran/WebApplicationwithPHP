<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
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
            <ul class="nav">
              <li><a>Home</a></li>
              <li><a href="C:\Users\JCH\Desktop\Index2.html">About Us</a></li>
			  <li><a href="C:\Users\JCH\Desktop\Index4.html">Testimonials</a></li>
			  <li><a href="C:\Users\JCH\Desktop\Index3.html">Contact Us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	  <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
            <?php
              /*
            <h1>Welcome to the Team 6 Online Food Help System Homepage!</h1>
            <p>We are glad you have made the decision to stop by.</p>
            <p><a class="btn btn-primary btn-large", href="C:\Users\JCH\Desktop\Index2.html">Learn more about us &raquo;</a></p>
                */
            ?>

            <?php
                include ("Connection.php");
                if(isset($_POST['submit']))
                {
                    $user_name = $_POST['user'];
                    $pass = $_POST['pass'];
                    $count = 0;

                    if (isset($_POST['provider'])&& $_POST['provider'] == 'Yes')
                    {
                        $provider = 'Yes';
                        $query = "select *from Providers where Providers.p_login = '$user_name' and Providers.p_passw ='$pass'";
                        $result = mysql_query($query);
                        $count = mysql_num_rows($result);
                    }
                    else
                    {
                        $provider='No';
                        $query = "select *from Members where Members.m_login = '$user_name' and Members.m_passw ='$pass'";
                        $result = mysql_query($query);
                        $count = mysql_num_rows($result);
                    }

                    if ($count == 1)
                    {
                        setcookie('username', $user_name, time() + 1*24*60*60);
                        setcookie('password', $pass, time() + 1*24*60*60);
                        setcookie('provider',$provider,time() + 1*24*60*60);
                        header("location:Index.php");
                    }
                    else
                    {
                        echo "<strong> Invalid! Try again</strong>";
                    }
                }
            ?>



              <?php
              if (!isset ($_COOKIE['username']) && !isset($_COOKIE['password']))
              {
                ?>
              <strong>Log In:</strong>
              <form action ="Login.php" method ="post">
                  <input class="span2" name = "user" type="text" placeholder="Username"><br/>
                  <input class="span2" name = "pass" type="password" placeholder="Password"><br/>
                  <font size ="2">Provider</font>  <input type="checkbox" name="provider" value="Yes" /><br/>
                  <button name="submit" type="submit" class="btn">Sign in</button>
              </form>
              <?php
              }
              else
              {
                  echo "<strong>You logged in </strong>";
                  header("location:Index.php");
              }
              ?>



            </div>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->


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

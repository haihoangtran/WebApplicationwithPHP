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
              <li><a href="Index.php">Home</a></li>
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

            <?php
                include ("Connection.php");
                if (isset($_POST['submit']))
                {
                    $comment = $_POST['comment'];
                    $user_name = $_COOKIE['username'];
                    $query = "select m_number from Members where Members.m_name = '$user_name'";
                    $result = mysql_query($query);
                    $row = mysql_fetch_assoc($result);
                    foreach($row as $col_value)
                    {
                        $user_id = $col_value;
                    }
                    $query = "select * from Testimonials";
                    $result = mysql_query($query);
                    $count=mysql_num_rows($result);
                    $count = $count + 1;
                    $date = date ("Y-m-d");
                    $query = "insert into Testimonials values ($count,'$comment','$date',$user_id)";
                    $result = mysql_query($query);
                    header("location:testimonial.php");
                }
            ?>

              <?php
                             if (isset($_COOKIE['username'] ) && isset ($_COOKIE['password']))
                             {
                                $provider = $_COOKIE['provider'];
                                if($provider == 'No')
                                {
                         ?>
                                    Please, Fill out the form! <br/>
                                    <form action="Testimonial.php" method ="POST">
                                    <table>
                                    <tr><td>Comment: </td></tr>
                                    <tr><td colspan ="2"> <textarea name ="comment"> </textarea> </td></tr>
                                    <tr><td colspan ="2"> <input type ="submit" name ="submit" value ="Submit"/></td></tr>
                                    </table>
                                    </form>
                     <?php
                                }
                                else
                                {
                                    ?>
                                    <strong>To wrtie a comment, you have to log in as a Member </strong><br/>
                     <?php
                                }
                             }
                             else
                             {?>

                                 <strong>To wrtie a comment, you have to log in as a Member </strong><br/>
                     <?php
                             }
              ?>

              <table>
                    <tr>
                        <br/>
                        <strong>Comments:</strong><br/>
                    </tr>
                    <tr>
                        <div id="testimonial" style="background-color:whitesmoke;height:60%;width:99.5%;float:left;overflow: scroll;border-style:groove;">
                            <?php
                            include ("./public/include/include.php");
                            $query = "select m_name,t_content from Testimonials, Members where Members.m_number = Testimonials.t_memberid";
                            //$query = "select * from Testimonials";
                            $result = mysql_query($query);
                           while ($row = mysql_fetch_assoc($result))
                           {
                               ?>
                                <font size ="2"> <?php echo $row['m_name'];?></font>
                                :
                                <font size ="2"> <?php echo $row['t_content'];?></font>
                                <br/>
                                <?php
                           }
                            ?>
                        </div>
                    </tr>
              </table>

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

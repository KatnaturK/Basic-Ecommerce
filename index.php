
<?php

    $con = mysql_connect("localhost", "root", "root")or die("Couldn't connect to server.");
    mysql_select_db("dbtest")or die("Couldn't connect to database.");

    session_start();

    if(isset($_POST['submit_l']))
    {
        $uname = mysql_real_escape_string(@$_POST['uname_l']);
        $password = mysql_real_escape_string(@$_POST['password_l']);

        $query = mysql_query("select * from users where password='$password' AND uname='$uname'", $con);
        $rows = mysql_num_rows($query);
        if ($rows == 1) 
        {
            $_SESSION['login_user']=$uname; 
            header("location: next.php"); 
        } 
        else 
        {
            echo "<script>
                alert('Username or Password is invalid');
            </script>";
        }
     
    }

    if(isset($_POST['submit']))
    {
        $uname = mysql_real_escape_string(@$_POST['uname']);
        $email = mysql_real_escape_string(@$_POST['email']);
        $password = mysql_real_escape_string(@$_POST['password']);
        $fname = mysql_real_escape_string(@$_POST['fname']);
        $lname = mysql_real_escape_string(@$_POST['lname']);
        $city = mysql_real_escape_string(@$_POST['city']);
        $zip = mysql_real_escape_string(@$_POST['zip']);
        $contact = mysql_real_escape_string(@$_POST['contact']);

        $query = mysql_query("select * from users where uname='$uname'", $con);
        $rows = mysql_num_rows($query);
        if($rows == 1)
        {
            ?>
                <script>document.getElementById("uname").setCustomValidity("User Name Taken");</script>
            <?php
            echo "<script>
                alert('User Name Taken');
            </script>";
        }
        else
        {
          
            if(mysql_query("INSERT INTO users(id,uname,email,password,fname,lname,city,zip,contact) VALUES('','$uname','$email','$password','$fname','$lname','$city','$zip','$contact')"))
            {
                $_SESSION['login_user']=$uname; 
                header("Location: next.php");
            }
            else
            {
            ?>
                <script>alert('error while registering you...');</script>
                <?php
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Ecommerce</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/modal.min.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password").onchange = validatePassword;
            document.getElementById("cpassword").onchange = validatePassword;
        }
        function validatePassword(){
        var pass2=document.getElementById("cpassword").value;
        var pass1=document.getElementById("password").value;
        if(pass1!=pass2)
            document.getElementById("cpassword").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("cpassword").setCustomValidity('');  
        }

        window.onload = function () {
            document.getElementById("email").onchange = validateEmail;
            document.getElementById("cemail").onchange = validateEmail;
        }
        function validatEmail(){
        var pass2=document.getElementById("cemail").value;
        var pass1=document.getElementById("email").value;
        if(pass1!=pass2)
            document.getElementById("cemail").setCustomValidity("Email Id Don't Match");
        else
            document.getElementById("cemail").setCustomValidity('');  
        }

    </script>

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Logo Name</a>
                    <a class="navbar-brand page-scroll" style="margin-left:400px;" href="" data-toggle="modal" data-target="#loginpopup" target="_self" style="cursor:pointer;">
                        <span>Login</span>
                    </a>
                    <a class="navbar-brand page-scroll" style="margin-left:20px;" href="" data-toggle="modal" data-target="#registerpopup" target="_self" style="cursor:pointer;">
                        <span>Register</span>
                    </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Your Favorite Source of Cards</h1>
                <hr>
                <p>We can help you build better surprises using the framework! Just buy your favourite card and start going, no strings attached!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Get Started</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">  
                    <p class="text-faded">
                        We introduce ourselves as White Blossoms Giftings Pvt. Ltd. a trendsetter of Innovative Personalised and corporate gifting.<br>
                        "You imagine... we Print."<br>
                        We invite you to experience in person the personal touch that makes the gifts so personal.<br><br>
                    <a class="btn btn-default btn-xl" href="" data-toggle="modal" data-target="#aboutus" target="_self" style="cursor:pointer;">Find Out More</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our products are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make products with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#first" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $300.00
                                </div>
                                <div class="project-name">
                                    Flower Photo FrameProject Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#second" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $400.00
                                </div>
                                <div class="project-name">
                                    Chocolate Gift Box
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#third" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $300.00
                                </div>
                                <div class="project-name">
                                    Heart Flip Flop Card
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#fourth" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $200.00
                                </div>
                                <div class="project-name">
                                    Butterfly Card
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#fifth" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $450.00
                                </div>
                                <div class="project-name">
                                    Chocolate Box
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="" data-toggle="modal" data-target="#sixth" target="_self" style="cursor:pointer;">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    $400.00
                                </div>
                                <div class="project-name">
                                    3D Cake Card
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <a class="btn btn-default btn-xl wow tada"  href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">Shop Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p><u>Corporate Office:</u>
                            <br>Red  Moments Giftings Pvt. Ltd. 11/12, 
                            <br>Amrut nagar,
                            <br>Opp. Shivaji Nagar Police Stn.,
                            <br>Kherwadi, Bandra (East),
                            <br>Mumbai - 400 051.
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>+91-8898115776</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:kt.katnaturk@gmail.com">kt.katnaturk@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <div class="footer">
            <p class="copy_right">&#169; 2015  Developed by &nbsp;<a href="#">Saloni</a>&nbsp; & &nbsp;<a href="#">Krutantak</a> </p>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

    <div id="loginpopup" class="modal fade" role="dialog">
        <div class="member-login">
            <star form>
                <form class="login" action="#" method="post" id="login_signin">
    
                    <div class="formtitle">Member Login</div>
                    <div class="input details0">
                        <input type="text" name="uname_l" id="uname_l" placeholder="User Name" required />
                    </div>

                    <div class="input details0">
                        <input type="password" name="password_l" id="password_l" placeholder="Password" required />
                    </div>

                    <div class="buttons">
                        <a href="#">Forgot password?</a>
                        <input class="bluebutton" type="submit" name="submit_l" value="Login" />
                        <div class="clear"> </div>
                    </div>
        
                </form>
        </div>
    </div>

    <div id="registerpopup" class="modal fade" role="dialog">    
        <div class="sign_up">
            <form class="sign" action="#" id="registration" method="post">
                <div class="formtitle">Sign Up-It's free.</div>

                <div class="top_section">
                    <div class="section">
                        <div class="input username details">
                            <input type="text" name="uname" id="uname" placeholder="User Name" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$" title="Alphanumeric 6 to 20 chars" required />
                        </div>

                        <div class="input password details">
                            <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="section">
                        <div class="input email details">
                            <input type="email" name="email" id="email" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required />
                        </div>

                        <div class="input re-password details">
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm-Password" required />
                        </div>

                        <div class="clear"> </div>
                    </div>

                </div>

                <div class="bottom-section">
                    <div class="title">Personal Details</div>

                    <div class="section">
                        <div class="input-sign details">
                            <input type="text" name="fname" id="fname" placeholder="First Name" pattern="[A-Za-z]+" title="Only Letters" required />
                        </div>

                        <div class="input-sign details1">
                            <input type="text" name="lname" id="lname" placeholder="Last Name" pattern="[A-Za-z]+" title="Only Letters" required />
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="section">
                        <div class="input-sign details">
                            <input type="text" name="contact" id="contact" placeholder="Contact No." pattern="^[0-9]{10}$" title="10 numeric characters only" required />
                        </div>

                        <div class="input-sign details1">
                            <input type="email" name="cemail" id="cemail" placeholder="Re-enter Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required />
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="section">
                        <div class="input-sign details">
                            <input type="text" name="city" id="city" placeholder="City" pattern="[A-Za-z]+" title="Only Letters" required />
                        </div>

                        <div class="input-sign details1">
                            <input type="text" name="zip" id="zip" placeholder="Zip No." pattern="[0-9]+" title="Only Numbers" required />
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="section">
                        <div class="input-sign details">
                            <input type="text" name="add1" id="add1" placeholder="Address1" required/> 
                        </div>

                        <div class="input-sign details1">
                            <input type="text" name="add2" id="add2" placeholder="Address2" required/> 
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="submit">
                        <input class="bluebutton submitbotton" id="sumbit" type="submit" name="submit" value="Sign Up" />
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="aboutus" class="modal fade" role="dialog">
        <div class="modal-dialog modal-about">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <div class="modal-content modal-about">
                <div class="modal-body">
                    <div class="divaboutus">
                        <p>
                            We introduce ourselves as White Blossoms Giftings Pvt. Ltd. a trendsetter of Innovative Personalised and corporate gifting. We have a unique way of gifting exclusive Personalised gift... that not only makes gift very special to others but also it remains in people's heart and mind forever. WHITE BLOSSOMS as an overall brand comprise in it various aspects such as manufacturing and marketing of extra ordinary personalised gift products, related machinery and items enjoying high reputation nationwide for its dynamic quality. Led by an experienced team of creative professionals, we have an in-depth knowledge of the market along with its requirements and we have succeeded in experimenting innovative as well as creative ideas.
                    </div>
                    <div class="divaboutus">
                        <p>
                            "You imagine... we Print."<br>
                            Gift is what... that really stands out! Thus, it's our endeavour to make your gift very special and unique.  Therefore, we offer hundreds of one-of-a-kind gifts designed exclusively for you. You can add and imprint photo, date, name, monogram, special message and many more options for more than 140 products. Hence, we are giving you thriving options for a perfect creative gifts for loved ones for any occasion that can be enjoyed for a lifetime.
                    </div>
                    <div class="divaboutus">
                        <p>
                            Red Moments is built on a foundation of trust and customer satisfaction and it is further nurtured with magical touch of innovation and creativity. We always ensure that our service quality is always on the top-of-the-line. Red Moments is forerunner among its competitors and the unique and personalized quotient makes it an alluring wonderland of personalized gifts.
                        <p>
                            We invite you to experience in person the personal touch that makes the gifts so personal.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="open" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <h1> Need to login to shop!</h1><br>
                        <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#loginpopup" target="_self" style="margin-right:30px;cursor:pointer;">&nbsp;&nbsp;&nbsp;login&nbsp;&nbsp;&nbsp;</a>
                        <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#registerpopup" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;</a> 
                    </cente>
                </div>
            </div>
        </div>
    </div>


    <div id="first" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/1.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="second" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/2.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="third" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/3.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="fourth" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/4.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="fifth" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/5.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="sixth" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-pics">
        <div class="modal-content">
          <div class="modal-body">
                <div class="hero-feature">
                <div class="thumbnail">
                        <img src="img/portfolio/6.jpg" alt="" style="width:555px;">
                        <div class="caption" style="text-align:center;">
                            <h3>3D Camera</h3>
                            <p class="product-price portfolio-color">$150.00</p>
                            <p><center>
                                <p>
                                    <a class="btn btn-primary" data-dismiss="modal" href="" data-toggle="modal" data-target="#open" target="_self" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;Shop&nbsp;&nbsp;&nbsp;</a> 
                                </p>
                            </cente></p>
                        </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>
</html>

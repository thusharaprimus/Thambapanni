<?php require_once('db.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  
  if (PHP_VERSION < 6) {
    $theValue = get_mtheValueagic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  // $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($connections,$theValue) : mysqli_escape_string($connections,$theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="exist.php";
  $loginEmail = $_POST['userEmail'];
  $LoginRS__query = sprintf("SELECT user_email FROM users WHERE user_email=%s", GetSQLValueString($loginEmail, "text"));
  mysqli_select_db($connections,$database_connections);
  $LoginRS=mysqli_query($connections,$LoginRS__query) or die(mysqli_error($connections));
  $loginFoundUser = mysqli_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginEmail;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "RegisterForm")) {
  $insertSQL = sprintf("INSERT INTO users (user_fname, user_lname, user_email, user_pass) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['userFname'], "text"),
                       GetSQLValueString($_POST['userLname'], "text"),
                       GetSQLValueString($_POST['userEmail'], "text"),
                       GetSQLValueString($_POST['userpassWord'], "text"));

  mysqli_select_db($connections,$database_connections);
  $Result1 = mysqli_query($connections,$insertSQL) or die(mysql_error());

   $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
   header(sprintf("Location: %s", $insertGoTo));
}

mysqli_select_db($connections,$database_connections);
$query_Register = "SELECT * FROM users";
$Register = mysqli_query($connections,$query_Register) or die(mysqli_error($connections));
$row_Register = mysqli_fetch_assoc($Register);
$totalRows_Register = mysqli_num_rows($Register);
?>


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  // $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysqli_select_db($connections,$database_connections);
$query_login = "SELECT * FROM users";
$login = mysqli_query($connections,$query_login) or die(mysqli_error());
$row_login = mysqli_fetch_assoc($login);
$totalRows_login = mysqli_num_rows($login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
// if (isset($_GET['accesscheck'])) {
//   $_SESSION['PrevUrl'] = $_GET['accesscheck'];
// }

if (isset($_POST['userEmail'])) {
  $loginEmail=$_POST['userEmail'];
  $password=$_POST['userpassWord'];
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "wrong.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($connections,$database_connections);
    
  $LoginRS__query=sprintf("SELECT user_email, user_pass FROM users WHERE user_email=%s AND user_pass=%s",
  GetSQLValueString($loginEmail, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($connections,$LoginRS__query) or die(mysqli_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Email'] = $loginEmail;     

    // if (isset($_SESSION['PrevUrl']) && true) {
    //   $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];   
    // }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php
mysqli_free_result($Register);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Thambapanni</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	
    <body>
    	  <link href="css/remodal.min.css" rel="stylesheet">
        <link href="ajax/libs/remodal/1.0.7/remodal-default-theme.min.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/base.css" />
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        
        <div id="preloader">
        	<div id="status">&nbsp;</div>
        </div>
        <div id="backgroundaudio">
		 <audio id="player" autoplay controls="" loop="" preload="">
                <source src="sound.mp3" type="audio/mp3"> Your browser does not support the audio element. </audio>
		<a href="javascript:void(0)" class="btn btn-success" data-toggle="tooltip" title="Preview" onclick="aud_play_pause()"><i id="stateicon" class="sound2"><img src="images/audio_off.png" class="img-responsive play-ico"/><img src="images/audio_on.png" class="img-responsive pause-ico"/></i></a>
           
        </div>
         <div class="hero-video-wrap">
            <div class="hero-video hidden-xs">
                <video muted="" autoplay=""  loop="">
                    <source src="images/1.jpg" type="">
                    <source src="bg.mp4" type="video/ogg"> Your browser does not support the <code>video</code> element. </video>
            </div>
        </div>
        <header>
            <div class="row">
                <div class="row">
                    <div class="logo">
                        <img src="images/logo.png" class="lo">
                    </div>
                    <div class="nav-sword">
                         <img src="images/menu.png" class="ri" />
                    </div>
                </div>
            </div>
        </header>
        
        <div id="main">
            <div class="container">
                <div id="nav-trigger">
                    <span>Menu</span>
                </div>
                <nav id="nav-main">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a class="btn btn-primary" data-toggle="modal" data-target="#instruction_modal">Instruction</a></li>
                        <li><a href="kathikawatha/forum/forumTopics.php">Kathikawatha</a></li>
                        <li><a class="btn btn-primary" data-toggle="modal" data-target="#download_modal">Wallpapers</a></li>
                        <li><a onclick="document.getElementById('id01').style.display='block'">Login</a></li>
                        
                    </ul>
                </nav>
                
                <nav id="nav-mobile"></nav>

        
            </div>
        </div>
        <div class="slideshow-container">

          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="wallpapers/1.jpg" style="width:50%">
            <div class="text">Caption Text</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="wallpapers/2.jpg" style="width:50%">
            <div class="text">Caption Two</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="wallpapers/3.jpg" style="width:50%">
            <div class="text">Caption Three</div>
          </div>

          </div>
          <br>

          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
        </div>
        <div id="id01" class="modal">
           <div class="form">
      
              <ul class="tab-group">
                <li class="tab active"><a href="#signup">Sign Up</a></li>
                <li class="tab"><a href="#login">Log In</a></li>
              </ul>
              
              <div class="tab-content">
                <div id="signup">   
                  <h1>Sign Up for Free</h1>
                  
                  <form method="POST" action="<?php echo $editFormAction; ?>" id="RegisterForm">
                  
                  <div class="top-row">
                    <div class="field-wrap">
                     <span id="sprytextfield1">
                      <label>
                        First Name<span class="req">*</span>
                      </label>
                      <input type="text" name = "userFname" required autocomplete="off" /></span>
                      <span><span class="textfieldRequiredMsg">A value is required.</span></span>
                    </div>
                
                    <div class="field-wrap">
                     <span id="sprytextfield2">
                      <label>
                        Last Name<span class="req">*</span>
                      </label>
                      <input type="text" name = "userLname" required autocomplete="off"/></span>
                      <span><span class="textfieldRequiredMsg">A value is required.</span></span>
                    </div>
                  </div>

                  <div class="field-wrap">
                  <span id="sprytextfield4">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name = "userEmail" required autocomplete="off"/></span>
                    <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></h3>
                    <span><span class="textfieldRequiredMsg">A value is required.</span></span>
                  </div>
                  
                  <div class="field-wrap">
                  <span id="sprypassword1">
                    <label>
                      Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name = "userpassWord" required autocomplete="off"/></span>
                    <span><span class="passwordRequiredMsg">A value is required.</span></span>
                  </div>
                  
                  <button type="submit"  name="RegisterButton" class="button button-block" value="Register" />Get Started</button>
                  <input type="hidden" name="MM_insert" value="RegisterForm" />
                  </form>

                </div>
                
                <div id="login">   
                  <h1>Welcome Back!</h1>
                  
                  <form id="LoginForm" name="LoginForm" method = "post" action="<?php echo $loginFormAction; ?>">
                  
                    <div class="field-wrap">
                    <span id="sprytextfield1">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name = "userEmail" required autocomplete="off"/>
                    <span class="textfieldRequiredMsg">A value is required.</span></span>
                  </div>
                  
                  <div class="field-wrap">
                    <span id="sprypassword1">
                    <label>
                      Password<span class="req">*</span>
                    </label>
                    <input type="password" name = "userpassWord" required autocomplete="off"/>
                    <span class="passwordRequiredMsg">A value is required.</span></span>
                  </div>
                  
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  
                  <button type="submit" name="LoginButton" value="Login" class="button button-block"/>Log In</button>
                  
                  </form>

                </div>
        
            </div><!-- tab-content -->
      
         </div> 
        </div>
        

        <div class="row">
        	<div class="col-sm-12 mesh banner-pad"> <img src="images/3.jpg" id="bg" class="hidden-md hidden-lg hidden-sm" alt="thambapanni">	
        		<div class="row abso">
              <div class="col-sm-10 col-sm-offset-1">         
                  <div class="row">
							      <div class="col-sm-3 text-right social-pad">
								      <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								      <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							        <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							        <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>	
						        </div>									
                  </div>
              </div>
            </div>
        	</div>
        </div>
        <div class="row white-bg">
            <div class="col-sm-12 mesh2"><img src="images/3.jpg" id="bg2" class="big-img" alt="thambapanni">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-5 hidden-xs">
                                <div class="row model-wrap">
                                    <div class="col-sm-12 model"></div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-sm-offset-2 text-pad text-pad-right">
                                <p>Thambapanni uses cutting edge technology to capture detailed 3D representations 
                                    of Sri Lanka's significant historical heritage sites before they are lost to natural disasters,
                                    destroyed by human aggression or ravaged by the passage of time
                                </p>
                                <p>The 3D model generated from using Maya and Unity is then colored 
                                    using photographs taken of the surface of the structure.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="buy-div">
            <div class="col-sm-12 mesh2 img-bg white"><img src="images/3.jpg" id="bg3" class="big-img" alt="thambapanni">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-7 text-pad pre-pad">
                                <h3>Contact Us</h3>
                                <h4 class="text-left">contactus</h4>
                                <div class="row">
                                    <div class="col-lg-12 subscribe">

                                        <form method="post" id="frmPreOrder" action="email.php">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" required=>
                                                <input type="text" class="form-control" name="last_name" id="lnama" placeholder="Last Name" required>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                <textarea rows="5" class="form-control" name="message" id="msg" placeholder="Message" cols="30"></textarea>
                                                <input type="hidden" value="1f828df0d0c387e" name="secret">
                                                <input type="submit" class="btn btn-default" name="submit" value="Submit">
                                               
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <p>The story and the concept are designed based on a historical Sri Lankan background. The storyline, places and surroundings are entirely fictional.</p>
                            </div>
                            <div class="col-sm-4 col-sm-offset-1 cover-pad"><img src="images/3.jpg" class="img-responsive" alt="thambapanni"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   	
        <footer>
            <div class="row foot">
                <div class="col-md-10 col-md-offset-1 ">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <a href="" class="foot-social" target="_blank"> <span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> </span> </a>
							<a href="" class="foot-social" target="_blank"> <span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-twitter fa-stack-1x fa-inverse"></i> </span> </a>
                            <a href="" class="foot-social" target="_blank"> <span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-instagram fa-stack-1x fa-inverse"></i> </span> </a>
                            <a href="" class="foot-social" target="_blank"> <span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i> </span> </a>
                        
						</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-12 foot-tag-pad">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="foot-tag-copy">Copyright © 2016 <a target="_blank" href=""></a> All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            
            <div class="modal fade bs-example-modal-sm" id="download_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><img src="images/logo.png" class="modal-tit-img"> | DOWNLOAD WALLPAPERS</h4>
                        </div>
                        <div class="modal-body text-center">
                            <div class="tabbable"> <!-- Only required for left/right tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Desktop&nbsp;&nbsp;<i class="fa fa-laptop" aria-hidden="true"></i></a></li>
                                    <li><a href="#tab2" data-toggle="tab">Mobile&nbsp;&nbsp;&nbsp;<i class="fa fa-mobile" aria-hidden="true"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active fade in" id="tab1">
                                        <div class="row">
                                            <div class="col-sm-12 scrl-down">
                                                <?php
                                                    $sql="SELECT path FROM wallpapers";
                                                    $result= mysqli_query($connections, $sql);
                                                
                                                foreach($result as $x){
                                                    echo"<div class='row down-div'>";
                                                    
                                                        echo"<div class='col-sm-6 col-xs-6'>";
                                                                echo"<img src='".$x['path']."' class='img-responsive wal-thumb'/>";
                                                        echo"</div>";
                                                            
                                                        echo"<div class='col-sm-6 col-xs-6 down-pad'>";
                                                                echo"<a href='".$x['path']."' download class='btn btn-default'>DOWNLOAD</a>";
                                                        echo"</div>";
                                                
                                                    echo "</div>";
                                                    
                                                }
                                                
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                        <div class="row">
                                            <div class="col-sm-12 scrl-down">
                                                <div class="row down-div">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <img src="images/mobile_wallpaper_1.jpg" class="img-responsive  mob-thumb"/>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6 down-pad">
                                                        <a href="wallpapers/mobile_wallpaper_1.jpg" download class="btn btn-default">DOWNLOAD</a>
                                                    </div>
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <img src="images/mobile_wallpaper_2.jpg" class="img-responsive mob-thumb"/>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6 down-pad">
                                                        <a href="wallpapers/mobile_wallpaper_2.jpg" download class="btn btn-default" >DOWNLOAD</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-sm" id="instruction_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel"> INSTRUCTION PAGE</h2>
                        </div>
                        <div class="modal-body text-center">
                            <div class="tabbable"> <!-- Only required for left/right tabs -->
                                
                                <div class="tab-content">
                                    <div class="tab-pane active fade in" id="tab1">
                                        <div class="row">
                                            <div class="col-sm-12 scrl1-down" >
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>JOIN WITH KATHIKAWATHA</h1>
                                                        <img src="images/myproject/kathikawatha.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>DOWNLOAD WALLPAPERS</h1>
                                                        <img src="images/myproject/wallpapers.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>SIGN UP</h1>
                                                        <img src="images/myproject/signup.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>SIGN IN</h1>
                                                        <img src="images/myproject/sign_in.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>GO TO TOUR</h1>
                                                        <img src="images/myproject/login.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       

        <script src="js/jquery.min.js"></script>
        <script  src="js/bootstrap.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.ui.touch-punch.min.js"></script>
        <script  src="js/custom.js"></script>
        <script  src="ajax/libs/remodal/1.0.7/remodal.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      
       
        
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
    </body>
</html>
<script>

    function aud_play_pause() {
    var myAudio = document.getElementById("player");
    if (myAudio.paused) {
      $('#stateicon').removeClass('sound');
      $('#stateicon').addClass('sound2');
      myAudio.play();
    } else {
      $('#stateicon').removeClass('sound2');
      $('#stateicon').addClass('sound');
      myAudio.pause();
   }
 }

</script>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>




<?php 
session_start();
$name = $_SESSION['MM_Email'];
$msg ='';
require_once ('connection.php');
if (!empty($_POST)) {
  $topic = $_POST['topic'];
  $message =$_POST['message'];
  $date= date('Y-m-d');

  $query= "INSERT INTO topics (topic_subject, topic_content, topic_date, user) VALUES ('$topic' ,'$message', '$date' ,'$name')";
  $result= mysqli_query($db, $query);

  if ($result){
    $msg ='<a href=forumTopics.php>View your topics</a>';
  }
  else{
    $msg= "Error" .'<br>'. mysqli_error($db);
  }

}
?>

<!DOCTYPE html>
<html>
  <head>
  
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      
  
  
	
	<link href="../css/mystyle.css" rel="stylesheet"><!--nav bar ekee css-->
	
  	<title>addThread</title>
  	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
  	<link href="../css/forum.css" rel="stylesheet" type="text/css">
    <link href="../css/navbar1n2.css" rel="stylesheet" type="text/css">
    <link href="../css/footer.css" rel="stylesheet">
    <script src="../bootstrap/jquary.js"></script> 
    <script src="../bootstrap/bootstrapjs.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
  </head>
  
			<div style="margin-top:-15%;">
                   <img class="logo1" src="../images/logo.png" width="20%" style="margin-top:200px;margin-left:10%;" />               
                   <img class="sword" src="../images/menu.png" width="60%" style="margin-left:45%;margin-top:-9%;"  />                
            </div>
			
			 <div id="main" style="margin-top:-10%;margin-left:20%;">
            <div class="container">
                <div id="nav-trigger">
                    <span>Menu</span>
                </div>
                <nav id="nav-main">
                    <ul>
                        <li><a href="../../home.php">Home</a></li>
                        <li><a href="">Instruction</a></li>
                        <li><a href="kathikawathaRegUsers/forum/forumTopics.php">Kathikawatha</a></li>
                        <li><a href="" data-toggle="modal" data-target="#download_modal">Wallpapers</a></li>
                        <li><a href="map.html">Tour</a></li>
                        <li><a href="logout.php">Logout</a></li> 
                    </ul>
                </nav>
                <nav id="nav-mobile"></nav>

        
            </div>
        </div>
  
  <style>
  .mylbl{
	  color:wheat;
	  
  }  

  body{
  background-image:url('../images/background.png');

  background-size:cover;   <!--mulu screen ekatama ganne mehemai-->
}
  
  </style>
  <body style=" margin-left: -110px;margin-right:100px;" >
   
      <div class="col-sm-8 col-sm-push-3 col-xs-12 insert-form" style="margin-top:-30px">
      	<div class="content col-xs-12">
          <h4 class="header-content mylbl">Your New Discussion Topic</h4>
            <form class="form-horizontal form-group-custom" method="post" action="addThread.php">
              <div class="form-group">
                <label class="control-label col-xs-2 mylbl">Subject:</label>
                <div class="col-xs-8">
                  <input type="text" class="form-control form-row" id="subject" name="topic" placeholder="Enter Subject" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-2 mylbl">Massage:</label>
                <div class="col-xs-8">
                  <textarea class="massage form-row form-control" rows="6" cols="8" name="message"></textarea>
                </div>
              </div>
             
              <div class="form-group form-group-custom">
                <div class="col-xs-offset-2 col-xs-8 btn-class">
                  <button onclick="location.href='forumTopics.php';" type="submit" class="btn btn-default button-custom">Post to forum</button>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-2"></label>
                <div class="col-xs-8">
                  <?php echo $msg; ?>
                </div>
              </div>
            </form>
        </div>
      </div>
    


<!-- strat footer -->
  

     
  

<!-- end of footer -->

  </body>
</html>
  <?php
	//include ("footer.php");
?>
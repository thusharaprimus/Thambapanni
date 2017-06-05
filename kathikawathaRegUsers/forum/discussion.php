<?php
require_once ("connection.php");
session_start();
$name = $_SESSION['MM_Email'];
?>

<!DOCTYPE html>
<html>
<head>

		
	<title>discussion</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../css/forum.css" rel="stylesheet" type="text/css">
	<link href="../css/navbar1n2.css" rel="stylesheet" type="text/css">
	<link href="../css/footer.css" rel="stylesheet">
	<script src="../bootstrap/jquary.js"></script>
    <script src="../bootstrap/bootstrapjs.js"></script>
    <!-- text editor -->
    <!-- <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->

	<!--moment.js-->
	<script src="../js/moment.js"></script>
  <style>
  p{
    color:black;
  }
  .wrapper {
  margin: 50px auto;
  width: 80%;
  height: 80%;
  background: white;
  border-radius: 10px;
  -webkit-box-shadow: 0px 0px 8px rgba(0,0,0,0.3);
  -moz-box-shadow:    0px 0px 8px rgba(0,0,0,0.3);
  box-shadow:         0px 0px 8px rgba(0,0,0,0.3);
  position: relative;
  z-index: 90;
}

.ribbon-wrapper-green {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: -3px;
  right: -3px;
}

.ribbon-green {
  font: bold 15px Sans-Serif;
  color: #333;
  text-align: center;
  text-shadow: rgba(255,255,255,0.5) 0px 1px 0px;
  -webkit-transform: rotate(45deg);
  -moz-transform:    rotate(45deg);
  -ms-transform:     rotate(45deg);
  -o-transform:      rotate(45deg);
  position: relative;
  padding: 7px 0;
  left: -5px;
  top: 15px;
  width: 120px;
  background-color: #BFDC7A;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#BFDC7A), to(#8EBF45)); 
  background-image: -webkit-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:    -moz-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:     -ms-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:      -o-linear-gradient(top, #BFDC7A, #8EBF45); 
  color: #6a6340;
  -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
  -moz-box-shadow:    0px 0px 3px rgba(0,0,0,0.3);
  box-shadow:         0px 0px 3px rgba(0,0,0,0.3);
}

.ribbon-green:before, .ribbon-green:after {
  content: "";
  border-top:   3px solid #6e8900;   
  border-left:  3px solid transparent;
  border-right: 3px solid transparent;
  position:absolute;
  bottom: -3px;
}

.ribbon-green:before {
  left: 0;
}
.ribbon-green:after {
  right: 0;
}​
  </style>

</head>

			<div style="margin-top:-15%;">
                   <img class="logo1" src="../images/logo.png" width="20%" style="margin-top:200px;margin-left:10%;" />               
                   <img class="sword" src="../images/menu.png" width="60%" style="margin-left:45%;margin-top:-9%;"  />                
            </div>
 <style>
  .mylbl{
	  color:wheat;
	  
  }  
  </style>

<body style=" margin-left: -110px;margin-right:100px;" background="../images/background.png">

	 <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
	<div>
		<div class="col-sm-10 col-sm-push-2 col-xs-12 insert-form" style="padding: 2%; margin-top:-50px">
			<div class="row">
				<?php
					$sql="SELECT topic_id, topic_subject, topic_content,topic_date, user FROM topics
					WHERE topics.topic_id = " . mysqli_real_escape_string($db, isset($_GET['id']) ? $_GET['id'] : null);
					$result= mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$id=mysqli_real_escape_string($db, isset($_GET['id']) ? $_GET['id'] : null);
					// echo($id);
				?>
				<div  id = "topicId" style="display:none"> <?php echo $id; ?> </div>
<div class="wrapper">
       <div class="ribbon-wrapper-green"><div class="ribbon-green">NEWS</div></div>
​
    			<div class="col-xs-12 thread-topic-content" id = "-1">
                    <p class="topic-subject mylbl"><?php echo $row['topic_subject']; ?></p>
                    <p class="topic-date mylbl"><?php echo $row['topic_date'] ?></p>
                    
					<div class="row">
                    	<div class="col-xs-push-1 col-xs-11 mylbl">
                    		<p><h3><?php echo $row['topic_content']; ?></h3></p>
                    	</div>
                      <div class="col-xs-push-1 col-xs-11 mylbl">
                      <p>Asked by : <?php echo $row['user']; ?></p>
                      </div>
                    </div>
					
					<a class="topic-date mylbl">EDIT</a>
					<a   class="topic-date mylbl">DELETE</a>
					
                    <div>
                    	<div class="col-xs-push-11 col-xs-1">
        					<a class="btn btn-default btn-xs" onclick = "ajaxReply(-1)"> Reply </a>
                    	</div>
            		</div>
                </div>
        		</div>
			</div>
<div class="wrapper">
       <div class="ribbon-wrapper-green"><div class="ribbon-green">ANSWERS</div></div>
			<div style="margin-left:15px;" id = "replytopLevel"> </div>
		</div>
    </div>
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
                  
                  <form method="POST" action="signup.php">
                  
                  <div class="top-row">
                    <div class="field-wrap">
                      <label>
                        First Name<span class="req">*</span>
                      </label>
                      <input type="text" name = "userFname" required autocomplete="off" />
                    </div>
                
                    <div class="field-wrap">
                      <label>
                        Last Name<span class="req">*</span>
                      </label>
                      <input type="text" name = "userLname" required autocomplete="off"/>
                    </div>
                  </div>

                  <div class="field-wrap">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name = "userEmail" required autocomplete="off"/>
                  </div>
                  
                  <div class="field-wrap">
                    <label>
                      Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name = "userpassWord" required autocomplete="off"/>
                  </div>
                  
                  <button type="submit"  name="submit" class="button button-block"/>Get Started</button>
                  
                  </form>

                </div>
                
                <div id="login">   
                  <h1>Welcome Back!</h1>
                  
                  <form role = "form" action = "login.php" method = "post">
                  
                    <div class="field-wrap">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name = "userEmail" required autocomplete="off"/>
                  </div>
                  
                  <div class="field-wrap">
                    <label>
                      Password<span class="req">*</span>
                    </label>
                    <input type="password" name = "userpassWord" required autocomplete="off"/>
                  </div>
                  
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  
                  <button type="submit" class="button button-block"/>Log In</button>
                  
                  </form>

                </div>
        
            </div><!-- tab-content -->
      
         </div> 
        </div>
	
<!-- New Replay Model -->
	<div class="modal fade"  id = "replyModel" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Your Reply</h4>
				</div>
				<div class="modal-body">
					<form id = "replayform">
						<div class="form-group">
							<label class="control-label" for="message">Massage:</label>
							<div>
								<textarea class="massage form-row form-control" rows="6" cols="8" name="message" id = "message"></textarea>
                <input type="text" name="name" value="<?php echo $name;?>">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-default submitModel btn-custom">Post to forum</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- start footer -->
</div>
	
	<!-- end of footer -->
	
	<!--delete model---->
</body>
</html>


<script src="../js/forum.discussion.js"></script>


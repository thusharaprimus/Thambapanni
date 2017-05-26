<?php
require_once ("connection.php");
?>

<!DOCTYPE html>
<html>
<head>

		
	<title>discussion</title>
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
	
	<div>
		<div class="col-sm-10 col-sm-push-2 col-xs-12 insert-form" style="padding: 2%; margin-top:-50px">
			<div class="row">
				<?php
					$sql="SELECT topic_id, topic_subject, topic_content,topic_date FROM topics
					WHERE topics.topic_id = " . mysqli_real_escape_string($db, isset($_GET['id']) ? $_GET['id'] : null);
					$result= mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$id=mysqli_real_escape_string($db, isset($_GET['id']) ? $_GET['id'] : null);
					// echo($id);
				?>
				<div  id = "topicId" style="display:none"> <?php echo $id; ?> </div>

    			<div class="col-xs-12 thread-topic-content" id = "-1">
                    <p class="topic-subject mylbl"><?php echo $row['topic_subject']; ?></p>
                    <p class="topic-date mylbl"><?php echo $row['topic_date'] ?></p>
                    
					<div class="row">
                    	<div class="col-xs-push-1 col-xs-11 mylbl">
                    		<p><?php echo $row['topic_content']; ?></p>
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
			<div style="margin-left:15px;" id = "replytopLevel"> </div>
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

	
	<!-- end of footer -->
	
	<!--delete model---->
</body>
</html>


<script src="../js/forum.discussion.js"></script>


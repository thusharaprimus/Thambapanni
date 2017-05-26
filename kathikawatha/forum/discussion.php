<?php
require_once ("connection.php");
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
 
	
	<link href="../css/mystyle.css" rel="stylesheet"><!--nav bar ekee css-->

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

	
			<div style="margin-top:9%;">
                   <img class="logo1" src="../images/logo.png" width="20%" style="margin-left:10%; margin-top:-10%;" />               
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
                        <li><a data-toggle="modal" data-target="#instruction_modal">Instruction</a></li>
                        <li><a href="forumTopics.php">Kathikawatha</a></li>
                        <li><a href="" data-toggle="modal" data-target="#download_modal">Wallpapers</a></li>
                        <li><a onclick="document.getElementById('id01').style.display='block'" >Login</a></li> 
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
                    
        		</div>
			</div>
			<div style="margin-left:15px;" id = "replytopLevel"> </div>
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
                                                        <img src="../../images/myproject/kathikawatha.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>DOWNLOAD WALLPAPERS</h1>
                                                        <img src="../../images/myproject/wallpapers.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>SIGN UP</h1>
                                                        <img src="../../images/myproject/signup.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>SIGN IN</h1>
                                                        <img src="../../images/myproject/sign_in.gif" class="img-responsive col-sm-12"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row down-div">
                                                    <div class="col-sm-12">
                                                    <h1>GO TO TOUR</h1>
                                                        <img src="../../images/myproject/login.gif" class="img-responsive col-sm-12"/>
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
</body>
</html>


<script src="../js/forum.discussion.js"></script>

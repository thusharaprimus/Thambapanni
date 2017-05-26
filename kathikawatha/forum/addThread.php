<?php 
$msg ='';
require_once ('connection.php');
if (!empty($_POST)) {
  $topic = $_POST['topic'];
  $message =$_POST['message'];
  $date= date('Y-m-d');

  $query= "INSERT INTO topics (topic_subject, topic_content, topic_date) VALUES ('$topic' ,'$message', '$date' )";
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
  	<title>addThread</title>
  	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
  	<link href="../css/forum.css" rel="stylesheet" type="text/css">
    <link href="../css/navbar1n2.css" rel="stylesheet" type="text/css">
    <link href="../css/footer.css" rel="stylesheet">
    <script src="../bootstrap/jquary.js"></script> 
    <script src="../bootstrap/bootstrapjs.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->
  </head>
  
		<div class="row">
                <div id="nav-sword">
                    <img src="../images/menu.png" class="ri" width="60%" style="margin-left:550px" />
                </div>
            </div>
        </header>
  
  <body style=" margin-left: -110px;margin-right:100px;" background="../images/background.png">
   
      <div class="col-sm-8 col-sm-push-3 col-xs-12 insert-form" style="margin-top:-30px">
      	<div class="content col-xs-12">
          <h4 class="header-content" >Your New Discussion Topic</h4>
            <form class="form-horizontal form-group-custom" method="post" action="addThread.php">
              <div class="form-group">
                <label class="control-label col-xs-2">Subject:</label>
                <div class="col-xs-8">
                  <input type="text" class="form-control form-row" id="subject" name="topic" placeholder="Enter Subject" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-2">Massage:</label>
                <div class="col-xs-8">
                  <textarea class="massage form-row form-control" rows="6" cols="8" name="message"></textarea>
                </div>
              </div>
             
              <div class="form-group form-group-custom">
                <div class="col-xs-offset-2 col-xs-8 btn-class">
                  <button type="submit" class="btn btn-default button-custom">Post to forum</button>
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
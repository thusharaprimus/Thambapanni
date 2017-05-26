<?php 
require_once ("connection.php");
?>



<!DOCTYPE html>
<html>
<head>

	<link href="../css/mystyle.css" rel="stylesheet"><!--nav bar ekee css-->

	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      
		
	
	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../css/forum.css" rel="stylesheet" type="text/css">	
	<link href="../css/navbar1n2.css" rel="stylesheet" type="text/css">
	<link href="../css/footer.css" rel="stylesheet">
	<script src="../bootstrap/jquary.js"></script> 
  	<script src="../bootstrap/bootstrapjs.js"></script>
  	<style type="text/css">
	    table tr:nth-child(even) {
	        background-color: #e1e1d0;
	    }
	    table tr:nth-child(odd) {
	        background-color: white;
	    }
		
		input[type=text] {
			width: 130px;
			height:5px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url('../images/search.png');
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 40px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
			margin-left:18%;
			margin-top:-18%;
		}
		
		input[type=text]:focus{
			width:20%;
		}
		
		


body{
	background-image:url('../images/background.png');

	background-size:cover;   <!--mulu screen ekatama ganne mehemai-->
}
	
	</style>

	
</head>
		
            <div>
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
                        <li><a data-toggle="modal" data-target="#instruction_modal">Instruction</a></li>
                        <li><a href="kathikawathaRegUsers/forum/forumTopics.php">Kathikawatha</a></li>
                        <li><a href="" data-toggle="modal" data-target="#download_modal">Wallpapers</a></li>
                        <li><a href="map.html">Tour</a></li>
                        <li><a href="logout.php">Logout</a></li> 
                    </ul>
                </nav>
                <nav id="nav-mobile"></nav>

        
            </div>
        </div>
		
<body >

		<!-- <form style="margin-left:0px ">
				<input type="text" name="search" placeholder="search....">
			</form>  -->
	
		<div class="col-sm-10 col-sm-push-2 col-xs-12 insert-form" style="margin-top:-50px">
			<div class="row">
				<div class="col-xs-12">
					<a href="addThread.php">
						<button class="button">Add a new discussion topic</button>
					</a>
				</div>
			</div>
			<div  class="row" style="padding: 1.5%">
				<?php
					$sql= "SELECT topic_id, topic_subject, topic_date, topic_by FROM topics";
					$result= mysqli_query($db, $sql);

					echo "<table>";
			   		echo "<tr height='50'>";

				        echo "<th class='col-sm-8'> Topic </th>";
				        echo "<th class='col-sm-2'> Posted Date </th>";
				        echo "<th class='col-sm-2'> Posted by </th>";

			    	echo "</tr>";

			    	echo "<tr>";
			        foreach ($result as $user) {
			          	echo  "<td class='col-sm-9 col-xs-9' height='50'>";
			          	echo "<a href='discussion.php?id=".$user['topic_id']."'>".$user['topic_subject']."</a>"." "."</td>";

			          	echo  "<td height='50' class='col-sm-2 col-xs-2'>";
			            echo $user['topic_date']." "."</td>";

			            echo "<td class='col-sm-2 col-xs-2'>";
			            echo $user['topic_by']." "."</td>";
			        echo "</tr>";   
					}	
					echo "</table>";
				?>
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

</body>



</html>


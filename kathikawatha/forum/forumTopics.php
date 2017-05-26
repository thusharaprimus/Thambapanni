<?php 
require_once ("connection.php");
//include ("search/getData.php");

?>



<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      

	<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#posts_content').html(html);
            $('.loading-overlay').fadeOut("slow");
        }
    });
}
</script>

	<link href='search/style.css' rel='stylesheet' type='text/css'>
	<script src="search/jquery.min.js"></script>

	 <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/font-awesome.min.css" rel="stylesheet">
	
	<link href="../css/mystyle.css" rel="stylesheet"><!--nav bar ekee css-->

		
	
	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
	<script src="../bootstrap/jquary.js"></script> 
  	<script src="../bootstrap/bootstrapjs.js"></script>
	
	<link href="../css/forum.css" rel="stylesheet" type="text/css">	
	<link href="../css/navbar1n2.css" rel="stylesheet" type="text/css">
	<link href="../css/footer.css" rel="stylesheet">
	
  	<style type="text/css">
	    table tr:nth-child(even) {
	        background-color: #e1e1d0;
	    }
	    table tr:nth-child(odd) {
	        background-color: white;
	    }
		
		input[type=text] {  <!--search bar eke css tika-->
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
		
		
<!--footer ekata ona css tikak-->

footer {
    background: #000
}

.foot {
    background: #0e0e0e;
    padding: 10px 0;
}

.foot-tag-copy,
.foot-tag-link {
    margin-right: 20px;
    font-size: 10px;
    display: inline-block
}

.foot-tag-pad {
    padding: 15px 0 10px
}

.foot-tag-copy {
    color: #9e9e9e
}

.foot a,.foot-tag-pad a {
    color: #ea6431;
    text-decoration: none
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
	<div style="margin-top:0%;>
			
			
			<div class="post-search-panel" style="margin-top:0%;">
				<input type="text" id="keywords" placeholder="search...." onkeyup="searchFilter()"/>
				 <select id="sortBy" onchange="searchFilter()">
					<option value="">Sort By</option>
					<option value="asc">Ascending</option>
					<option value="desc">Descending</option>
                </select>
			</div>
			
			<div id="main" style="margin-top:-10%;margin-left:20%;">
				<div class="container">
					<div id="nav-trigger">
						<span>Menu</span>
					</div>
					<nav id="nav-main">
						<ul>
							<li><a href="../../home.php">Home</a></li>
							<li><a  data-toggle="modal" data-target="#instruction_modal">Instruction</a></li>
							<li><a href="">Kathikawatha</a></li>
							<li><a href="" data-toggle="modal" data-target="#download_modal">Wallpapers</a></li>
							<li><a onclick="document.getElementById('id01').style.display='block'" >Login</a></li> 
						</ul>
					</nav>
					<nav id="nav-mobile"></nav>		       
				</div>
			</div>	
	</div>
		
<body style=" margin-left: -110px;margin-right:100px; margin-top:-200px" >
			
	<div class="post-wrapper" style=" margin-left: 15%;">
    <div class="loading-overlay"><div class="overlay-content">Loading.....</div></div>
    <div id="posts_content">
    <?php
    //Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
    include('connection.php');
    
    $limit = 10;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM topics");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];
    
    //initialize pagination class
    $pagConfig = array(
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM topics ORDER BY topic_id DESC LIMIT $limit");
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['topic_id'];
        ?>
            <div class="list_item"><a href='discussion.php?id=".$row['topic_id']."'><h2><?php echo $row["topic_subject"]; ?></h2></a></div>
        <?php } ?>
        </div>
        <?php echo $pagination->createLinks(); ?>
    <?php } ?>
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


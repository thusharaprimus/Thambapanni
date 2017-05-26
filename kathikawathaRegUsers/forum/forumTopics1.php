<?php 
require_once ("connection.php");
?>

<!DOCTYPE html>
<html>
<head>	
	<link href="../bootstrap/bootstrap.css" rel="stylesheet" type="text/css">  	
  	
	<style type="text/css">
	    table tr:nth-child(even) {
	        background-color: #e1e1d0;
	    }
	    table tr:nth-child(odd) {
	        background-color: white;
	    }		
	</style>
	
</head>       
		
		
<body style=" margin-left: -110px;margin-right:100px; margin-top:0px" >		 
	
		<div class="col-sm-10 col-sm-push-2 col-xs-12 insert-form" >
			
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
			            echo "<a href=#></a>"." "."</td>";
			        echo "</tr>";   
					}	
					echo "</table>";
				?>
			</div>
		</div>

</body>



</html>


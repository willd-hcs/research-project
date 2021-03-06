<?php
session_start();
require_once '../config/config.php';
$userid = $_SESSION['SESS_USERID'];

function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['submit1'])){
	
	$que1 = ($_POST['que1']);
	
	if($que1!=""){	
	
	$userid = $_SESSION['SESS_USERID'];
	$que1 = test_input($_POST['que1']);
	//Change table name
	$sql = "INSERT INTO exp2_answer_q1
	(
		userid, que1
	)
	VALUES 
	(
		'$userid' ,'$que1'
	)";

	if ($conn->query($sql) === TRUE) {
 
	} else {
 
	}
	session_write_close();
	$conn->close(); 

	header("Location: q2.php");
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
  
	<title>HCI Research: Online testing</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
		///////////////////////////////////////////////////////////////////////disable buttons until all loaded
		$(document).ready(function(){
		$(":button,:submit").removeAttr("disabled");  
		});
		//////////////////////////////////////////////////////////////////////show first image
		$(document).ready(function() {
			$("#btnclick").toggle(function() {
				$("#div2").show();
				$('#div1').hide();
			}, function() {
				$("#div1").show();
				$("#div2").hide();
			});
		});
		///////////////////////////////////////////////////////////////////// //showing image         
		$(function() {
			setTimeout(function() {
				$("#div2").fadeOut(0);
			}, 5000)//edit time
			
			$('#btnclick').click(function() {
			
				$('#div2').show();
				setTimeout(function() {
					$("#div2").fadeOut(0);
				}, 5000)
				
				$('#div3').delay(5000).fadeIn(0);
			})	
		})
	</script>
    </head>

    <body>
	<!--1-->
		<div id="div1" class="div1"> <!--Show image button-->
		<div class="size">	
		<span class="spacer"></span>
		<div class="panel panel-primary">			
			<div class="panel-heading">Questions in the test</div>				
				<div class="panel-body">
					<p>After you click the button below, you'll be shown a website. After the website disappears, I would like you to answer the following questions</p>
					
					<p class="text-danger"><strong>What do you think this page was about?</strong></p>
					<p class="text-danger"><strong>What products/services do you think this company sells?</strong></p>
					<p class="text-danger"><strong>Please rate the website you have just seen based on visual appeal.</strong></p>
					
					<p>Please take your time to answer the questions as there is no rush. Have fun!</p>
				</div>
			</div>
		</div>
		
		<p><center><input type="button" class="btn btn-primary" id="btnclick" value="Show me the website" /></center></p>

		</div>

	<!--2-->
		<div id="div2"  class="content" style="display:none;text-align:center "> <!--Image-->
		
			<img src="../images/statefarm.png"/>
			
		</div>
	<!--3-->
		<div class="container">	
			<div class="row">
				<div class=".col-md-6">
				<div id="div3" style="display:none; text-align:left; margin: auto; padding: 20px; margin:1px;"> 
					<div class="row">
						<div class=".col-md-6">
						
						<img src="../images/banner.png">
						
						</div>
					</div>
					<!--Form-->
					<form action="" method="POST">  
						What do you think this page was about?</br></br>
						
						<textarea class="form-control" name="que1" rows="3" id="que1" required></textarea>
						
						</br>
						<div style="padding:10px; margin: auto;; text-align: center;">
						
						<button type="submit" class="btn btn-primary" id="submit1" name="submit1">Submit response</button>
					
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
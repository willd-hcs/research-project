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
		
	$que2 = ($_POST['que2']);
		
	if($que2!=""){	
	
	$que1 = test_input($_POST['que2']);
	//Change table name
	$sql = "INSERT INTO exp2_answer_q2
	(
		userid, que2
	)
	VALUES 
	(
		'$userid' ,'$que2'
	)";

	if ($conn->query($sql) === TRUE) {
 
	} else {
 
	}
		
	$conn->close(); 

	header("Location: q3.php");
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
	</head>

    <body>

	<!---->
		<div class="container">	
			<div class="row">
			<div class="size">
				<div class=".col-md-6">
					<div class="row">
						<div class=".col-md-6">
						
						<img src="../images/banner.png">
						
						</div>
					<!--Form-->
					<form action="" method="POST">  
						What products/services do you think this company sells?</br></br>
						
						<textarea class="form-control" name="que2" rows="3" id="que2" required></textarea>
						
						</br>
						<div style="padding:10px; margin: auto;; text-align: center;">
						
						<button type="submit" class="btn btn-primary" id="submit1" name="submit1">Submit response</button>
					
						</div>
					</form>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

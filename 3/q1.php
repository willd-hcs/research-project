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
	
	$que1 = test_input($_POST['que1']);
	//Change table name
	$sql = "INSERT INTO answer_q1_3
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
		
	$conn->close(); 

	header("Location: q2.php");
	} else 
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
    <script type='text/javascript'>
		alert('Please provide a response to the question.');
	</script>
	</head>

    <body>

	<!---->
		<div class="container">	
			<div class="row">
				<div class=".col-md-6">
					<div class="row">
						<div class=".col-md-6">
						
						<img src="../images/banner.png">
						
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

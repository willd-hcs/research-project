<?php
session_start();
require_once '../config/config.php';
error_reporting(0);
$userid = $_SESSION['SESS_USERID'];

if(isset($_POST['submit1'])){
	
	$que3 = ($_POST['que3']);
		
	if($que3!=""){	
	
	$que3 = $_POST['que3'];
	//Change table name
	$sql = "INSERT INTO answer_q3 
	(
		userid, que3
	)
	VALUES 
	(
		'$userid' ,'$que3'
	)";

	if ($conn->query($sql) === TRUE) {
 
	} else {
 
	}
		
	$conn->close(); 

	header("Location: ../result/result.php");
	} else {
		echo "<script type='text/javascript'>
		alert('Please provide a response to the question.');
		</script>";
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
							</div>
							<!--Form-->
							<form action="" method="POST">  
							Please rate the website you have just seen based on visual appeal.</br></br>
							<table>
							<tr>
							<td>very unappealing</td>
							<td><input type="radio" name="que3" id="que3" value="1" required></td>
							<td><input type="radio" name="que3" id="que3" value="2"></td>
							<td><input type="radio" name="que3" id="que3" value="3"></td>
							<td><input type="radio" name="que3" id="que3" value="4"></td>
							<td><input type="radio" name="que3" id="que3" value="5"></td>
							<td><input type="radio" name="que3" id="que3" value="6"></td>
							<td><input type="radio" name="que3" id="que3" value="7"></td>
							<td><input type="radio" name="que3" id="que3" value="8"></td>
							<td><input type="radio" name="que3" id="que3" value="9"></td>
							<td>very appealing</td>
							</tr>
							</table>						
							</br>
							</br>
							<div style="padding:10px; margin: auto;; text-align: center;">						
							
							<button type="submit" class="btn btn-primary" id="submit1" name="submit1">Finish test</button>
						
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

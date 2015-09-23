<?php
session_start();
require_once '../config/config.php';
$userid = $_SESSION['SESS_USERID'];
?>

<!DOCTYPE html>
<html>
  <head>
  
	<title>HCI Research: Online testing</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

	<script type="text/javascript">
	
	$(document).ready(function() {

		$('input[type="checkbox"]').click(function() {

			if ($(this).attr("value") == "red") {

				$(".red").toggle();

			}
		});
	});
	
	</script>
	
  </head>
  
  <body>
  
  <div class="container">
  
	<div class="row">
		<div class="size">
		
		<img src="../images/banner.png">
		
		</div>
		
	</div>
  
	<div class="row" >
		<div class="size">
			<div class="panel panel-primary">
			<div class="panel-heading">Walkthrough video</div>
				<div class="panel-body">
			
				<p>Please take a look at the short video below. It's only 30 seconds long and it'll walk you through the test and show you what you have to do.</p>
			
				<iframe src="http://www.moovly.com/embed/b03ea105-7001-34bb" width="770" height="433" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>

			<p>
			<a href="#anchor"><label><input type="checkbox" name="colorCheckbox" value="red"> I've seen the video, let's continue.</label></a>

			<a name="anchor">
				<div style="margin: auto;; text-align: center;" class="red box">
					 <a href="screenshot.php"><button type="button"  class="btn btn-primary" id="preview"/>Take the test</button></a>
				</div>
			</a>
			</p> 
	
		</div>
	</div>
  </div>
  </body>
</html>
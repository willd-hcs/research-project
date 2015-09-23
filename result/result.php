<?php
session_start();
require_once '../config/config.php';
$userid = $_SESSION['SESS_USERID'];
$thanks = "Send feedback";
function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['submit1'])){
	
	$feedback = test_input($_POST['feedback']);
	
	if($feedback!=""){	
		$userid = $_SESSION['SESS_USERID'];
		//Change table name
		$sql = "INSERT INTO feedback 
		(
			userid, feedback
		)
		VALUES 
		(
			'$userid' ,'$feedback'
		)";
		if ($conn->query($sql) === TRUE) {
			$thanks = "Thank you for the feedback";
		} 
		}
}

?>
<!DOCTYPE html>
<html>
  <head>
  
	<title>HCI Research: Investigating online testing methods</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-66561826-1', 'auto');
	  ga('send', 'pageview');

	</script>
	</head>

	<div class="container">
		<div class="row" >	
			<div class="size">
			
			<img src="../images/banner.png">
			
			</div>
		</div>
	
		<div class="row" >
			<div class="size">
	  		<div class="panel panel-primary">
			<div class="panel-heading">Thank you for your assistance with my research </div>
				<div class="panel-body">
				<p> I hope you found the test quick and simple. Once again, it was a test of the design and the content of the website, not you.</p>
				
				<p>It was generous of you to help me on this research. I am very thankful for your time and efforts. Click <a href="#myModal" data-toggle="modal"=>here</a> to enter into the prize draw for a £30 Amazon Voucher.</p>
<!-- Feedback form -->				
				<form action="" method="POST">  
					Do you have any additional comments or feedback? This field is optional.</br></br>
					<textarea class="form-control" name="feedback" rows="1" id="feedback"></textarea>
					</br>
					<div style="padding:0px; margin: auto;; text-align: center;">
					<button type="submit" class="btn btn-primary" id="submit1" name="submit1"><?php echo $thanks ?></button>
					</div>
				</form>
				
				<p></br>You can take a look at the website again by clicking the image below:</p>
				<div style="margin: auto; text-align: center; ">
				<a href="../images/statefarm.png">
				<div style="height:290px">
				<img height=300 width=175 src="../images/statefarm.png"/></a>
				</div>
				<div class=size2 style="padding:15px">
				
				<h4>Share this test to help me complete my research so we can have simple and beautiful websites.</h4>
				
				<div class="arrow"><img height=52px class=arrow" src="../images/curved_arrow_green.png"/></div>
				
				<input onClick="this.select();" type="text" size=21 width="200px" style="color: #666666; clear: both; padding-right:5px;height:150;width:162;background-color:#acfacc" value="http://uxstudent.co.uk/research/">
				</input>
				
				<span class="label label-success">Ctrl / Cmd + C to copy</span>
				
				<ul class="share-buttons">
				  <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://uxstudent.co.uk/research/" 
				  title="Share on Facebook" target="_blank"><img src="../images/social_flat_rounded_rects_svg/Facebook.svg"></a></li>
				 
				 <li><a href="https://twitter.com/home?status=http://uxstudent.co.uk/research/" 
				  target="_blank" title="Tweet"><img src="../images/social_flat_rounded_rects_svg/Twitter.svg"></a></li>
				  
				  <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=http://uxstudent.co.uk/research/&title=HCI%20Research:%20Evaluating%20websites%20and%20exposure%20times&summary=&source=" 
				  target="_blank" title="Publish on WordPress"><img src="../images/social_flat_rounded_rects_svg/Linkedin.svg"></a></li>
				</ul>
				
				<span class="spacer"></span>
				
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	</div>

	<div class="modal" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h4 class="modal-title">Prize Draw - Thank you for helping me with my research.</h4>
			
			<div class=size2 style="padding:15px">
				
			<h4>Share this test to help me complete my research so we can have simple and beautiful websites.</h4>
			
			<div class="arrow"><img height=30px class=arrow" src="../images/curved_arrow_green.png"/></div>
			
			<input type="text" size=21 width="200px" style="color: #666666; clear: both; padding-right:5px;height:150;width:162;background-color:#acfacc" value="http://uxstudent.co.uk/research/">
			</input>
			
			<span class="label label-success">Ctrl / Cmd + C to copy</span>
			
			<span class="spacer"></span>
			
			</div>
				  <div class="modal-body">
				
					<iframe src="https://docs.google.com/forms/d/1lsMdMmof_sjLdN95lwYFN6ks6dba8O8r3cEslIv8OjE/viewform?embedded=true" width="400" height="620" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>		    
				  
				  </div>
		  <div class="modal-footer">
		  
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
		  </div>
		</div>
	  </div>
	</div>
	</div>
	
    <body>

	<!---->
	</body>
</html>
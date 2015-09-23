<?php
session_start();
require_once 'config/config.php';

function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$unique_id =  mt_rand();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $taken =    test_input($_POST["taken"]);
   $age =      test_input($_POST["age"]);
   $language = test_input($_POST["language"]);
   $country =  test_input($_POST["country"]);

if(isset($_POST['submit'])){ //On click
	
	$sql = "INSERT INTO about_users 
	(
		unique_id, taken, age, language, country
	)
	VALUES 
	(
		'$unique_id', '$taken', '$age', '$language','$country'
	)";
	
	if ($conn->query($sql) === TRUE) {  //Execute and insert data
	} else {
	}

	$qry = "SELECT * FROM about_users WHERE unique_id='$unique_id'";

	$result = mysqli_query($conn,$qry);

    $member = mysqli_fetch_assoc($result);

    $_SESSION['SESS_USERID'] = $member["userid"];

	$qry1 = "SELECT *   FROM answer_q1";
	$qry2 = "SELECT *  FROM answer_q1_2";
	$qry3 = "SELECT *  FROM answer_q1_3";
	$qry4 = "SELECT *  FROM exp2_answer_q1";

	$result1 = mysqli_query($conn,$qry1);
	$result2 = mysqli_query($conn,$qry2);
	$result3 = mysqli_query($conn,$qry3);
	$result4 = mysqli_query($conn,$qry4);

	$rowcount1 = mysqli_num_rows($result1);
	$rowcount2 = mysqli_num_rows($result2);
	$rowcount3 = mysqli_num_rows($result3);
	$rowcount4 = mysqli_num_rows($result4);

	//echo "0.5s set has  " . $rowcount1 . '</br>';
	//echo "5s set has " . $rowcount2 . '</br>';
	//echo "10s set has " . $rowcount3 . '</br>';    echo "exp2 has " . $rowcount4 . '</br>';

	if ($rowcount1 = $rowcount2 = $rowcount3 = $rowcount4){ // if all rowcounts are equal
		$testnumber = mt_rand(1,4);
	}
		
	if ($rowcount1 < $rowcount2){ //rowcount for 0.5 is lowest
		if($rowcount1 < $rowcount3){
			if($rowcount1 < $rowcount4){			
			$testnumber = 1;
			}
		}
	};

	if ($rowcount2 < $rowcount1){ // rowcount for 5s is lowest
		if($rowcount2 < $rowcount3){		
			if($rowcount2 < $rowcount4){			
			$testnumber = 2;	

			}
		}
	};

	if ($rowcount3 < $rowcount1){ // rowcount for 10s is lowest
		if($rowcount3 < $rowcount2){	
			if($rowcount3 < $rowcount4){	
			$testnumber = 3;	
			}
		}
	};

	if ($rowcount4 < $rowcount1){ //rowcount for exp2 is lowest	
		if ($rowcount4 < $rowcount2){	
			if ($rowcount4 < $rowcount3){		
			$testnumber = 4;
			}
		}
	};

//echo "Final Testnumber: " . $testnumber;
	header("Location: $testnumber/instructions.php");

}
}
?>
<!DOCTYPE html>    
<html>	      
<head>	          
<title>HCI Research: Online testing</title>		        
<meta name="viewport" content="width=device-width, initial-scale=1.0">        
<!-- Bootstrap -->        
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">				
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>        
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
  <!--
  if (screen.width <= 800) {
	window.location = "redir.php";
  }
  //-->
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66561826-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>	
<div class="container">				
	<div class="row">			
		<div class="size">						
			<img src="images/banner.png">
		</div>			
		</div>	
		
		<div class="size">		
		<div class="panel panel-primary">			
		<div class="panel-heading">Please tell us a little bit about yourself.</div>				
		<div class="panel-body">
		<p> Responses from participants who are below the age of 18 or have taken the test before will be omitted from the research. </p>
			<form class="form" action="" method="POST">				
			<fieldset><table>			
			<tr>
<!-- Taken--><td style="padding-top: 15px">Have you taken this test before? *</td>					
			<td>
			<div class="radio">
				<input type="radio" name="taken" id="taken" value="Yes" required >Yes</div>
			<div class="radio">
				<input type="radio" name="taken"  id="taken" value="No">No</div></td>
			</tr>						
			
<!-- Age--> <tr><td style="padding-top: 15px">How old are you? *</td>
			<td>	
			<div class="radio">
				<input type="radio" name="age" id="age" value="Below 18" required >Below 18</div>
			<div class="radio">
				<input type="radio" name="age"  id="age" value="18 or above">18 or above</div></td>
			</tr>
<!-- Drop downs -->
			<tr>
			<td style="padding-top: 15px">What is your native language? *</td>					
			<td><select class="form-control" name="language" id="language" required>					
			<option value="" selected>Please select a language</option>					
			<option value="English">English</option>
			<option value="Spanish">Spanish</option>
			<option value="Portuguese">Portuguese</option>
			<option value="Russian">Russian</option>
			<option value="Hindi/Urdu">Hindi/Urdu</option>
			<option value="Arabic">Arabic</option>
			<option value="Bengali">Bengali</option>										
			<option value="Chinese">Chinese</option>
			<option value="Japanese">Japanese</option>										
			<option value="Other EU">Other European language</option>										
			<option value="Other Asian">Other Asian language</option>															
			<option value="Other African">Other African language</option>										
			</select></td>
			</tr>				
			<tr>					
			<td style="padding-top: 15px">Which was the first country where you lived? *</td>					
			<td><select class="form-control" name="country" id="country" required>					         
			<option value="" selected>Please select a country</option>        <option value="GB">United Kingdom</option>        <option value="US">United States</option>		<option value="--">------</option>        <option value="AF">Afghanistan</option>        <option value="AL">Albania</option>        <option value="DZ">Algeria</option>        <option value="AS">American Samoa</option>        <option value="AD">Andorra</option>        <option value="AO">Angola</option>        <option value="AI">Anguilla</option>        <option value="AQ">Antarctica</option>        <option value="AG">Antigua and Barbuda</option>        <option value="AR">Argentina</option>        <option value="AM">Armenia</option>        <option value="AW">Aruba</option>        <option value="AU">Australia</option>        <option value="AT">Austria</option>        <option value="AZ">Azerbaijan</option>        <option value="BS">Bahamas</option>        <option value="BH">Bahrain</option>        <option value="BD">Bangladesh</option>        <option value="BB">Barbados</option>        <option value="BY">Belarus</option>        <option value="BE">Belgium</option>        <option value="BZ">Belize</option>        <option value="BJ">Benin</option>        <option value="BM">Bermuda</option>        <option value="BT">Bhutan</option>        <option value="BO">Bolivia</option>        <option value="BA">Bosnia and Herzegowina</option>        <option value="BW">Botswana</option>        <option value="BV">Bouvet Island</option>        <option value="BR">Brazil</option>        <option value="IO">British Indian Ocean Territory</option>        <option value="BN">Brunei Darussalam</option>        <option value="BG">Bulgaria</option>        <option value="BF">Burkina Faso</option>        <option value="BI">Burundi</option>        <option value="KH">Cambodia</option>        <option value="CM">Cameroon</option>        <option value="CA">Canada</option>        <option value="CV">Cape Verde</option>        <option value="KY">Cayman Islands</option>        <option value="CF">Central African Republic</option>        <option value="TD">Chad</option>        <option value="CL">Chile</option>        <option value="CN">China</option>        <option value="CX">Christmas Island</option>        <option value="CC">Cocos (Keeling) Islands</option>        <option value="CO">Colombia</option>        <option value="KM">Comoros</option>        <option value="CG">Congo</option>        <option value="CD">Congo, the Democratic Republic of the</option>        <option value="CK">Cook Islands</option>        <option value="CR">Costa Rica</option>        <option value="CI">Cote d'Ivoire</option>        <option value="HR">Croatia (Hrvatska)</option>        <option value="CU">Cuba</option>        <option value="CY">Cyprus</option>        <option value="CZ">Czech Republic</option>        <option value="DK">Denmark</option>        <option value="DJ">Djibouti</option>        <option value="DM">Dominica</option>        <option value="DO">Dominican Republic</option>        <option value="TP">East Timor</option>        <option value="EC">Ecuador</option>        <option value="EG">Egypt</option>        <option value="SV">El Salvador</option>        <option value="GQ">Equatorial Guinea</option>        <option value="ER">Eritrea</option>        <option value="EE">Estonia</option>        <option value="ET">Ethiopia</option>        <option value="FK">Falkland Islands (Malvinas)</option>        <option value="FO">Faroe Islands</option>        <option value="FJ">Fiji</option>        <option value="FI">Finland</option>        <option value="FR">France</option>        <option value="FX">France, Metropolitan</option>        <option value="GF">French Guiana</option>        <option value="PF">French Polynesia</option>        <option value="TF">French Southern Territories</option>        <option value="GA">Gabon</option>        <option value="GM">Gambia</option>        <option value="GE">Georgia</option>        <option value="DE">Germany</option>        <option value="GH">Ghana</option>        <option value="GI">Gibraltar</option>        <option value="GR">Greece</option>        <option value="GL">Greenland</option>        <option value="GD">Grenada</option>        <option value="GP">Guadeloupe</option>        <option value="GU">Guam</option>        <option value="GT">Guatemala</option>        <option value="GN">Guinea</option>        <option value="GW">Guinea-Bissau</option>        <option value="GY">Guyana</option>        <option value="HT">Haiti</option>        <option value="HM">Heard and Mc Donald Islands</option>        <option value="VA">Holy See (Vatican City State)</option>        <option value="HN">Honduras</option>        <option value="HK">Hong Kong</option>        <option value="HU">Hungary</option>        <option value="IS">Iceland</option>        <option value="IN">India</option>        <option value="ID">Indonesia</option>        <option value="IR">Iran (Islamic Republic of)</option>        <option value="IQ">Iraq</option>        <option value="IE">Ireland</option>        <option value="IL">Israel</option>        <option value="IT">Italy</option>        <option value="JM">Jamaica</option>        <option value="JP">Japan</option>        <option value="JO">Jordan</option>        <option value="KZ">Kazakhstan</option>        <option value="KE">Kenya</option>        <option value="KI">Kiribati</option>        <option value="KP">Korea, Democratic People's Republic of</option>        <option value="KR">Korea, Republic of</option>        <option value="KW">Kuwait</option>        <option value="KG">Kyrgyzstan</option>        <option value="LA">Lao People's Democratic Republic</option>        <option value="LV">Latvia</option>        <option value="LB">Lebanon</option>        <option value="LS">Lesotho</option>        <option value="LR">Liberia</option>        <option value="LY">Libyan Arab Jamahiriya</option>        <option value="LI">Liechtenstein</option>        <option value="LT">Lithuania</option>        <option value="LU">Luxembourg</option>        <option value="MO">Macau</option>        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>        <option value="MG">Madagascar</option>        <option value="MW">Malawi</option>        <option value="MY">Malaysia</option>        <option value="MV">Maldives</option>        <option value="ML">Mali</option>        <option value="MT">Malta</option>        <option value="MH">Marshall Islands</option>        <option value="MQ">Martinique</option>        <option value="MR">Mauritania</option>        <option value="MU">Mauritius</option>        <option value="YT">Mayotte</option>        <option value="MX">Mexico</option>        <option value="FM">Micronesia, Federated States of</option>        <option value="MD">Moldova, Republic of</option>        <option value="MC">Monaco</option>        <option value="MN">Mongolia</option>        <option value="MS">Montserrat</option>        <option value="MA">Morocco</option>        <option value="MZ">Mozambique</option>        <option value="MM">Myanmar</option>        <option value="NA">Namibia</option>        <option value="NR">Nauru</option>        <option value="NP">Nepal</option>        <option value="NL">Netherlands</option>        <option value="AN">Netherlands Antilles</option>        <option value="NC">New Caledonia</option>        <option value="NZ">New Zealand</option>        <option value="NI">Nicaragua</option>        <option value="NE">Niger</option>        <option value="NG">Nigeria</option>        <option value="NU">Niue</option>        <option value="NF">Norfolk Island</option>        <option value="MP">Northern Mariana Islands</option>        <option value="NO">Norway</option>        <option value="OM">Oman</option>        <option value="PK">Pakistan</option>        <option value="PW">Palau</option>        <option value="PA">Panama</option>        <option value="PG">Papua New Guinea</option>        <option value="PY">Paraguay</option>        <option value="PE">Peru</option>        <option value="PH">Philippines</option>        <option value="PN">Pitcairn</option>        <option value="PL">Poland</option>        <option value="PT">Portugal</option>        <option value="PR">Puerto Rico</option>        <option value="QA">Qatar</option>        <option value="RE">Reunion</option>        <option value="RO">Romania</option>        <option value="RU">Russian Federation</option>        <option value="RW">Rwanda</option>        <option value="KN">Saint Kitts and Nevis</option>         <option value="LC">Saint LUCIA</option>        <option value="VC">Saint Vincent and the Grenadines</option>        <option value="WS">Samoa</option>        <option value="SM">San Marino</option>        <option value="ST">Sao Tome and Principe</option>         <option value="SA">Saudi Arabia</option>        <option value="SN">Senegal</option>        <option value="SC">Seychelles</option>        <option value="SL">Sierra Leone</option>        <option value="SG">Singapore</option>        <option value="SK">Slovakia (Slovak Republic)</option>        <option value="SI">Slovenia</option>        <option value="SB">Solomon Islands</option>        <option value="SO">Somalia</option>        <option value="ZA">South Africa</option>        <option value="GS">South Georgia and the South Sandwich Islands</option>        <option value="ES">Spain</option>        <option value="LK">Sri Lanka</option>        <option value="SH">St. Helena</option>        <option value="PM">St. Pierre and Miquelon</option>        <option value="SD">Sudan</option>        <option value="SR">Suriname</option>        <option value="SJ">Svalbard and Jan Mayen Islands</option>        <option value="SZ">Swaziland</option>        <option value="SE">Sweden</option>        <option value="CH">Switzerland</option>        <option value="SY">Syrian Arab Republic</option>        <option value="TW">Taiwan, Province of China</option>        <option value="TJ">Tajikistan</option>        <option value="TZ">Tanzania, United Republic of</option>        <option value="TH">Thailand</option>        <option value="TG">Togo</option>        <option value="TK">Tokelau</option>        <option value="TO">Tonga</option>        <option value="TT">Trinidad and Tobago</option>        <option value="TN">Tunisia</option>        <option value="TR">Turkey</option>        <option value="TM">Turkmenistan</option>        <option value="TC">Turks and Caicos Islands</option>        <option value="TV">Tuvalu</option>        <option value="UG">Uganda</option>        <option value="UA">Ukraine</option>        <option value="AE">United Arab Emirates</option>        <option value="UM">United States Minor Outlying Islands</option>        <option value="UY">Uruguay</option>        <option value="UZ">Uzbekistan</option>        <option value="VU">Vanuatu</option>        <option value="VE">Venezuela</option>        <option value="VN">Viet Nam</option>        <option value="VG">Virgin Islands (British)</option>        <option value="VI">Virgin Islands (U.S.)</option>        <option value="WF">Wallis and Futuna Islands</option>        <option value="EH">Western Sahara</option>        <option value="YE">Yemen</option>        <option value="YU">Yugoslavia</option>        <option value="ZM">Zambia</option>        <option value="ZW">Zimbabwe</option>						</select></td>		</td></tr>		</table>		
			<div style="padding-top:10px; margin: auto;; text-align: center;">			<p>* Marks the required fields</p>				
			
			<!-- Submit1 button -->
			<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
			
			</div>			</fieldset>
			</form>
			</div>
			</div>
			</div>  	<div class="row">
			<p class="footer"><?php echo $_SESSION['success']?></p>
			</div>
</body>
</html>
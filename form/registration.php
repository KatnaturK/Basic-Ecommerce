
<?php
	session_start();

	if(isset($_SESSION['user'])!="")
	{
		header("Location: home.php");
	}

	include_once 'connect.php';

	if(isset($_POST['submit']))
	{
		$uname = mysql_real_escape_string($_POST['uname']);
	 	$email = mysql_real_escape_string($_POST['email']);
	 	$password = md5(mysql_real_escape_string($_POST['password']));
	 	$fname = mysql_real_escape_string($_POST['fname']);
	 	$lname = mysql_real_escape_string($_POST['lname']);
	 	$city = mysql_real_escape_string($_POST['city']);
	 	$zip = mysql_real_escape_string($_POST['zip']);
	 	$contact = mysql_real_escape_string($_POST['contact']);

	 	$res=mysql_query("SELECT * FROM users WHERE uname='$uname'");
		$row=mysql_fetch_array($res);
	 	if($row['uname']==$uname)
		{
			?>
		    	<script>document.getElementById("uname").setCustomValidity("User Name Taken");</script>
		    <?php
		}
		else
		{
		  
			 if(mysql_query("INSERT INTO users(id,uname,email,password,fname,lname,city,zip,contact) VALUES('','$uname','$email','$password','$fname','$lname','$city','$zip','$contact')"))
			 {
			  ?>
			        <script>alert('successfully registered ');</script>
			        <?php
			        header("Location: login.php");
			 }
			 else
			 {
			  ?>
			        <script>alert('error while registering you...');</script>
			        <?php
			 }
		}
	}
?>

<!DOCTYPE HTML>
<html>
<head>


	<title>Registration Form</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<link href="registration.css" rel="stylesheet" type="text/css" media="all" />


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password").onchange = validatePassword;
			document.getElementById("cpassword").onchange = validatePassword;
		}
		function validatePassword(){
		var pass2=document.getElementById("cpassword").value;
		var pass1=document.getElementById("password").value;
		if(pass1!=pass2)
			document.getElementById("cpassword").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("cpassword").setCustomValidity('');	 
		//empty string means no validation error
		}	
	</script>

</head>
<body>


	<div class="sign_up">
			<form class="sign" action="#" id="registration" method="post">
				<div class="formtitle">Sign Up-It's free</div>
						<div class="input">
							<input type="text" name="uname" id="uname" placeholder="User Name" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$" title="Alphanumeric 6 to 20 chars" required />
						</div>

						<div class="input">
							<input type="email" name="email" id="email" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required />
						</div>

						<div class="input">
							<input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
						</div>

						<div class="input">
							<input type="password" name="cpassword" id="cpassword" placeholder="Confirm-Password" required />
						</div>

						<div class="input">
							<input type="text" name="fname" id="fname" placeholder="First Name" pattern="[A-Za-z]+" title="Only Letters" required />
						</div>

						<div class="input">
							<input type="text" name="lname" id="lname" placeholder="Last Name" pattern="[A-Za-z]+" title="Only Letters" required />
						</div>

						<div class="input">
							<input type="text" name="city" id="city" placeholder="City" pattern="[A-Za-z]+" title="Only Letters" required />
						</div>

						<div class="input">
							<input type="text" name="zip" id="zip" placeholder="Zip No." pattern="[0-9]+" title="Only Numbers" required />
						</div>

						<div class="input">
							<input type="text" name="contact" id="contact" placeholder="Contact No." pattern="^[0-9]{10}$" title="10 numeric characters only" required />
						</div>

						<div class="submit">
							<input class="bluebutton submitbotton" id="sumbit" type="submit" name="submit" value="Sign Up" />
						</div>

			</form>
	</div>



</body>
</html>
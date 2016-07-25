
<?php
	session_start();

	include_once 'connect.php';

	if(isset($_SESSION['user'])!="")
	{
	 header("Location: home.php");
	}

	if(isset($_POST['submit']))
	{
		 $uname = mysql_real_escape_string($_POST['uname']);
		 $password = mysql_real_escape_string($_POST['password']);
		 $res=mysql_query("SELECT * FROM users WHERE uname='$uname'");
		 $row=mysql_fetch_array($res);
		 if($row['password']==md5($password))
		 {
			  $_SESSION['user'] = $row['id'];
			  header("Location: home.php");
		 }
		 else
		 {
		  ?>
		        <script>alert('wrong details');</script>
		        <?php
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
	<link href="login.css" rel="stylesheet" type="text/css" media="all" />


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

	<script type="text/javascript">
		
	</script>

</head>
<body>


	<div class="sign_up">
			<form class="sign" action="#" id="registration" method="post">
				<div class="formtitle">Member Login</div>
						<div class="input">
							<input type="text" name="uname" id="uname" placeholder="User Name" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$" title="Alphanumeric 6 to 20 chars" required />
						</div>

						<div class="input">
							<input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
						</div>

						<div class="submit">
							<input class="bluebutton submitbotton left" id="sumbit" type="submit" name="submit" value="Sign In" />
						</div>
						<div class="submit-signup">
							<a class="bluebutton submitbotton right" href="registration.php" style="text-decoration:none;"/>Sign Up?</a>
						</div>

			</form>
	</div>



</body>
</html>
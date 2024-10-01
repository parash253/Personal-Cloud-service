<?php
	if(!is_dir("Home")) {
	  mkdir("Home");
	}
	if(!is_dir("Home/Documents")) {
	  mkdir("Home/Documents");
	}
	if(!is_dir("Home/Files")) {
	  mkdir("Home/Files");
	}
	if(!is_dir("Home/Images")) {
	  mkdir("Home/Images");
	}
	if(!is_dir("Home/Movies")) {
	  mkdir("Home/Movies");
	}
	if(!is_dir("Home/Music")) {
	  mkdir("Home/Music");
	}
	if(!is_dir("Home/Video")) {
	  mkdir("Home/Video");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="js/sweetalert.min.js"></script> 
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<title>LoggingPage</title>
  	<link rel="stylesheet" type="text/css" href="css/glitchandfont.css">
  	<link rel="stylesheet" type="text/css" href="css/loginpage.css">

  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/sweetalert.min.js"></script> 
	<script src="js/bootstrap.min.js"></script>

	<!-- ******* -->
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<!-- Glitch Part Of Classified -->
	<div class="glitchpart">
		<div>
			<img class="glitch1" src="images\classified.gif" alt="FireGiF" />
		</div>
	</div>
  <!-- Glithc Part of Classified Finished above -->
	<div class="container mt-3">
		<img style="height: 100%; width: 100%; position: fixed; left: 0px; top: 0px; z-index: -100;"  src="images\fires.gif" alt="FireGiF" />
		<div class="row  text-center " style="border-bottom: 3px groove #FFB266;">
			<h1 class="fonts">Personal Cloud Service</h1>
		</div>
		<div class="row shadow-lg  " style="border-bottom: 3px groove #FFB266;">
			<form  method="post" action="#">
				<h2 class="fonts">Username</h2>
				<h3> <input class="input" placeholder=" Username" type="text" name="username" required><hr class="mt-3 mb-3"></h3>
				<h2 class="fonts">Password</h2> 
				<h3> <input class="input" placeholder=" Password" type="password" name="userpass" required><hr class="mt-3 mb-3"></h3></h3>
				<br>
				<input class=" font btn btn-info btn-lg shadow-lg" type="submit" value="LOGIN" name="submit">
				<br><br>
			</form>
		</div>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			$uname=$_POST['username'];
			$pass=$_POST['userpass'];
			$error='';
			$success='';
			if($uname == "personal")
			{
				if($pass == "cloud")
				{
					$error = "";
					$success = "Welcome Admin!!!";
					session_start();
					$_SESSION['admin'] = "admin";

					//redirecting to another page//
					header("location: index.php");
				}
				else
				{
					$error = "is not a valid Admin Password!!!";
					$success = "";
					echo '<script>swal({
	                  title: "Password is not Valid",
	                  text: "Your Provided Password is incorrect" ,
	                  icon: "error",
	                  html:true
	            }); </script>'; 
				}
			}
			else
			{
				$error = "is not a valid Admin Username!!!";
				$success = "";
				echo '<script>swal({
	                  title: "Username is not Valid",
	                  text: "Your Provided username is incorrect" ,
	                  icon: "error",
	                  html:true
	            }); </script>'; 
			}
		}
	?>
</body>
</html>
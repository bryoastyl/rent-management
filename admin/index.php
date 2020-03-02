<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>TenantsMngt | Admin Login</title>
	
	<link rel="stylesheet" href="style.css">
</head>

<body>
	
<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Tenants</span> Management System</h1>
			</div>
			<nav>
				
			</nav>
		</div>
	</header>
	<section id="main">
		<div class="container">
			<div class="header">
				<h2 align="center">Landlord Login</h2>
			</div>
			<form method="POST" action="">
				<div class="input-group">
					<label>username</label>
					<input type="text" name="username">
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password">
				</div>
				<div class="input-group">
					<button type="submit" name="login" class="btn">Login</button>
				</div>
			</form>
		</div>
	</section>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
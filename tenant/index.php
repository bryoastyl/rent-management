<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$id_no=($_POST['id_no']);
$sql ="SELECT email,id_no FROM tenants WHERE email=:email and id_no=:id_no";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':id_no', $id_no, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'pinfo.php'; </script>";
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

	<title>TenantsMngt|Tenant Login</title>
	
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
				<h2 align="center">Tenant Login</h2>
			</div>
			<form method="POST" action="">
				<div class="input-group">
					<label>Email</label>
					<input type="text" name="email">
				</div>
				<div class="input-group">
					<label>ID Number</label>
					<input type="password" name="id_no">
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
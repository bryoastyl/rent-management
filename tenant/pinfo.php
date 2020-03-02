<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$idno=$_POST['idno'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$htype=$_POST['htype'];
$hno=$_POST['hno'];
$sql="INSERT INTO  tenants(firstname,lastname,id_no,phone_no,email,house_type,h_no) VALUES(:firstname,:lastname,:idno,:phone,:email,:htype,:hno)";
$query = $dbh->prepare($sql);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':idno',$idno,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':htype',$htype,PDO::PARAM_STR);
$query->bindParam(':hno',$hno,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Tenant Registered successfully";
}
else 
{
$error="Something went wrong. Please try again";
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
	<meta name="theme-color" content="#3e454c">
	
	<title>TMS | Personal Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
	<?php 
					$useremail=$_SESSION['alogin'];
					$sql = "SELECT * from tenants where email=:useremail";
					$query = $dbh -> prepare($sql);
					$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
					foreach($results as $result)
				{ ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Personal Info of <span style="color: #e8491d;"><?php echo htmlentities($result->firstname ." ". $result->lastname);?></span></h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="form-group">
												<label class="col-sm-4 control-label">Full Name</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->firstname ." ". $result->lastname);?>" readonly>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">Last Name</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->email);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">ID Number</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->id_no);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Phone Number</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->phone_no);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Email</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->email);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">House Type</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->house_type);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">House Number</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="<?php echo htmlentities($result->h_no);?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Period Stayed</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Amount Required</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Amount Paid</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Outstanding Balance</label>
												<div class="col-sm-4">
													<input class="form-control white_bg" value="" readonly>
												</div>
											</div>
											<div class="hr-dashed"></div>
															
																					
										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>
<?php }} ?>
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
<?php } ?>
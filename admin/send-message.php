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
$email=$_POST['email'];
$title=$_POST['title'];
$content=$_POST['content'];
$fullname-$_POST['fullname'];
$pno=$_POST['pno'];
$sql="INSERT INTO  messages(recipient,title,content) VALUES(:email,:title,:content)";
$query = $dbh->prepare($sql);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':content',$content,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="message sent successfully";
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
	
	<title>TMS | Send Message</title>

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
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Send Message</h2>

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
													<input type="text" class="form-control" name="fullname" id="brand" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Email ID</label>
												<div class="col-sm-4">
													<input type="email" class="form-control" name="email" id="brand" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Phone number</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="pno" id="brand" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Title</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="title" id="brand" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Message</label>
												<div class="col-sm-4">
													<textarea name="content" id="brand" cols="35" rows="5" class="form-control" required=""></textarea>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Send</button>
												</div>
											</div>

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

  <?php
if(isset($_POST['submit']))
{
$fullname=$_POST['fullname'];
$title=$_POST['title'];
	
	if(isset($_POST['pno']))
{
$phone=$_POST['pno'];
$pno= preg_replace('/^0/','+254',$phone);
	}
	// Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your authentication credentials
     $username   = "kukena";
    $apikey     = "c5d4eff8abd0494c48f850cff5d6f0d197907004c4d1fc2efee69e46f2c90cbf";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $recipients = $pno;
    // And of course we want our recipients to know what we really do
	
	//Include the messange that you want to send to the sender
	$message    = $title."\n Dear ".$fullname .". " .$content." "."";
	
	
    //$message    = "Dear ".$fullname.". Your KHOPESHA loan request will be processed shortly";
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    /*************************************************************************************
      NOTE: If connecting to the sandbox:
      1. Use "sandbox" as the username
      2. Use the apiKey generated from your sandbox application
         https://account.africastalking.com/apps/sandbox/settings/key
      3. Add the "sandbox" flag to the constructor
      $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
         $error[] = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dear '.$roomno.'. Your KHOPESHA loan request will be processed shortly. </div><div id="returnVal" style="display:none;">false</div>';
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
    // DONE!!! 
}
	?>
	<?php } ?>
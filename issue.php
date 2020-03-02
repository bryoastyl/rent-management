<?php include "dbconnection.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="import" content="width=device-width">
	<title>HIL | Personal Info</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/javascript" href="script.js">
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<img src="./images/Highland.png">
				<h1><span class="highlight">Highland</span> inv Ltd</h1>
			</div>
			<nav>
				<ul>
					<li><a href="personalinfo.php">Personal Info</a></li>
					<li><a href="finance.php">Rent statement</a></li>
					<li><a href="messages.php">Messages</a></li>
					<li class="current"><a href="issue.php">Issue Addressing</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section id="main">
		<div class="container">
		<div>
			<div class="header">
				<h2 align="center">Issues Addressing</h2>
			</div>
			<form enctype="multipart/form-data" method="post">
				<div class="input-group">
					<label>Issue Intensity</label>
					<select name="intensity">
						<option>Select</option>
						<option value="normal">Normal</option>
						<option value="urgent">Urgent</option>
					</select>
				<div class="input-group">
					<label>Issue</label>
					<input type="text" name="title" required="">
				</div>
				<div class="input-group">
					<label>Brief description</label>
					<textarea name="description" placeholder="Describe your issue here..." rows="10" cols="35" class="textissues" required=""></textarea>
				</div>
				<div class="input-group">
					<button type="submit" name="issue_submit" class="btn">Submit</button>
				</div>
			</form>
			<?php
        		if(isset($_POST['issue_submit']))
                        {
         

                           // include("dbconnection.php");
                            $fname=$_SESSION['names'];
                            $lname=$_SESSION['lastname'];
                            $phone=$_SESSION['pno'];
                            $email=$_SESSION['email'];
                            $hno=$_SESSION['hnum'];
                            $intensity=mysqli_real_escape_string($connection,$_POST['intensity']);
                            $title=mysqli_real_escape_string($connection,$_POST['title']);
                            $desc=mysqli_real_escape_string($connection,$_POST['description']);
                            //$pro=$_POST['profession'];
                           // $id=$_POST['id_no'];
                            //$tel=mysqli_real_escape_string($connection,$_POST['tel']);
                            //$country=$_POST['country'];
                            //$city=$_POST['city'];
                          
                            $sql="INSERT INTO issues(firstname,lastname,phone_no,email,house_no,intensity,title,description,date) VALUES ('$fname','$lname','$phone','$email','$hno','$intensity','$title','$desc',now())";
                            $sql_result=mysqli_query($connection,$sql);
                            if($sql_result)
                            {
                                
                                ?>
                                <script>
                                    alert("Successfully sent");
                                    window.location.assign('issue.php');
                                </script>

                               <?php
                                //header("location:float_page2.php");
                            }
                            else
                            {
                                ?>
                                <script>
                                    alert("Something went wrong,please try again");
                                </script>

                               <?php
                            } 
         
                            
                        }
    
        
        ?>
		</div>
		</div>
	</section>
	<footer>
		<p>Highland Investment Limited, Copyright &copy; 2019</p>
	</footer>
</body>
</html>
<?php include "dbconnection.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="import" content="width=device-width">
	<title>HIL | Personal Info</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
					<li class="current"><a href="personalinfo.php">Personal Info</a></li>
					<li><a href="finance.php">Rent statement</a></li>
					<li><a href="messages.php">Messages</a></li>
					<li><a href="issue.php">Issue Addressing</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section id="main">
		<div class="container">
			<form action="" method='post'>
				<table style="width: 10%">
					<thead>
						<tr>
							<th>id</th>
							<th>Date</th>
							<th>Title</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody>
						<?php 
    
							    $query = "SELECT * FROM communication ORDER BY id ASC ";
							    $select_posts = mysqli_query($connection,$query);  

							    while($row = mysqli_fetch_assoc($select_posts )) {
							        
							        $post_id  = $row['id'];
							        $date     = $row['date'];
							        $title    = $row['title'];
							        $details  = $row['details'];
							        
							        echo "<tr>";
							        /*echo "<td>$post_id </td>";*/
						             echo "<td>$post_id</td>";
						             echo "<td>$date</td>";
						             echo "<td>$title</td>";
						             echo "<td>$details</td>";
							    ?> 
					</tbody>
				</table>
			</form>
			<?php
        
		        if(isset($_GET['post_id']))
		        {
		            $id=$_GET['post_id'];
		            $sql="SELECT * FROM communication WHERE id=$post_id";
		            $sql_result=mysqli_query($connection,$sql);
		            while($row=mysqli_fetch_assoc($sql_result))
		            {
		                $post_id  = $row['id'];
				        $date     = $row['date'];
				        $title    = $row['title'];
				        $details  = $row['details'];
		            }
		    ?>
		    <script>
        
	        	document.getElementById('table').style.display="none";
	            document.getElementById('add_product').style.display="none";
	            document.getElementById('view_product').style.display="block";
	            document.getElementById('new_orders').style.display="none";
	            document.getElementById('users').style.display="none";
	        </script>

		</div>
	</section>
	<footer>
		<p>Highland Investment Limited, Copyright &copy; 2019</p>
	</footer>
</body>
</html>
<?php } ?>
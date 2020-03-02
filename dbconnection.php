<?php
$connection = mysqli_connect('localhost','root','','tenantmagement');
if(!$connection)
{
	die("failed to connect" .mysqli_error());

}
?>
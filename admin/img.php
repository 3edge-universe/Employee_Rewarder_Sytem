<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","erm");
	$sql="SELECT `image` FROM `admin` WHERE `username`='admin'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
	{
		echo $row[0];
	}
	mysqli_close($conn);
?>	
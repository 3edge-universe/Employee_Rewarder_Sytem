<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","erm");
	$sql="SELECT `image` FROM `emp_record` WHERE `emp_id`='".$_SESSION['id']."'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
	{
		echo $row[0];
	}
	mysqli_close($conn);
?>	
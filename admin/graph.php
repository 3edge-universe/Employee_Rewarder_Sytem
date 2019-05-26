<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","erm");
	$data['dates']=array();
	$data['value']=array();
	$sql="SELECT `date`,Count(`emp_id`) FROM `order` Group by `emp_id`,`date`";
	$i=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($i)){
	array_push($data['dates'],$row[0]);
	array_push($data['value'],(int)$row[1]);
}
echo json_encode($data);
 ?>
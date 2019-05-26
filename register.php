<?php 
	if(isset($_POST['button']))
	{
		$pwd=md5($_POST['password']);
	if(!empty($_FILES['uimg']['tmp_name']))
	{
	$uimg = addslashes(file_get_contents($_FILES['uimg']['tmp_name']));
	$type3=strtolower(pathinfo($_FILES['uimg']['tmp_name'],PATHINFO_EXTENSION));
	}
	else
	{
	$uimg=NULL;
	$type3='jpg';
	}
	if (($type3!='jpg' || $type3!='png'|| $type3!='jpeg'))
	{	
		echo "<script>alert('Upload Image Only'); </script>";
	}
	else
	{ 
	$conn = mysqli_connect("localhost","root","","erm");
	#insert into room table
	$sql="INSERT INTO `emp_record` VALUES ('','".$_POST['name']."','".$_POST['username']."','".$pwd."','".$_POST['email']."','".$_POST['father']."','".$_POST['mobile1']."','".$_POST['mobile2']."','".$_POST['aadhar']."','$uimg','".$_POST['10ths']."','".$_POST['10pts']."','".$_POST['12ths']."','".$_POST['12pts']."','".$_POST['address']."','".$_POST['position']."')";
	$i=mysqli_query($conn,$sql);
	#extract from room table
	$sql="SELECT `emp_id` FROM `emp_record` WHERE `username`='".$_POST['username']."'";
	$j=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($j)) 
			{
				$eid=$row[0]; 
				break;
			}
	#insert into user table
	$sql="INSERT INTO `emp_intensive` VALUES ('$eid','0','0','0','0')";
	$k=mysqli_query($conn,$sql);
	if($i && $k)
	{	
		echo "<script>alert('Your Data Uploaded, Eid is= $eid'); </script>";
		header('Location:login.php');
	}
	else
	{
		echo "<script>alert('An error Occured, Try again'); </script>";
	}
	mysqli_close($conn);
	}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="name" required>
                                </div>
								<div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
								<hr border='2'>
								<h3>Personal Details</h3>
								<div class="form-group">
                                    <label>Father's Name</label>
                                    <input class="au-input au-input--full" type="text" name="father" placeholder="Father's Name" required>
                                </div>
								<div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address" required>
                                </div>
								<div class="form-group">
                                    <label>Aadhar</label>
                                    <input class="au-input au-input--full" type="text" name="aadhar" placeholder="Aadhar no" required>
                                </div>
								<div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="text" name="mobile1" placeholder="Mobile no" required>
                                </div>
								<div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="text" name="mobile2" placeholder="Mobile no" >
                                </div>
								<hr>
								<h3>Education Details</h3>
								<div class="form-group">
                                    <label>10th</label>
                                    <input class="au-input au-input--full" type="text" name="10ths" placeholder="School Name" required>
                                    <br><br><input class="au-input au-input--full" type="text" name="10pts" placeholder="Percent" required>
                                </div>
								<div class="form-group">
                                    <label>12th</label>
                                    <input class="au-input au-input--full" type="text" name="12ths" placeholder="School Name" required>
                                    <br><br><input class="au-input au-input--full" type="text" name="12pts" placeholder="Percent" required>
                               </div>
							   <hr>
							   <div class="form-group">
                                    <label>Position</label>
                                    <input class="au-input au-input--full" type="text" name="position" placeholder="Position" required>
                               </div>
							   <div class="form-group">
                                    <label>Upload a photo</label>
									<input type="file" name="uimg" value="fileupload" id="uimg" required>
								</div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree" required>Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name='button'>register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
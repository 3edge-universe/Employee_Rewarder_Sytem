<?php 
include_once('header.php');
$conn = mysqli_connect("localhost","root","","erm");
if (isset($_POST['update']))
{
	if(!empty($_FILES['img']['tmp_name']))
	{
	$uimg = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$sql2="UPDATE `emp_record` SET `image` = '$uimg' WHERE `emp_id`='".$_SESSION['id']."'";
	$o=mysqli_query($conn,$sql2);
	echo "<script>alert('Image Changed'); </script>";
	}
	#Update data
	$sql="UPDATE `emp_record` SET `Name`='".$_POST['name']."',`email`='".$_POST['email']."',`father`='".$_POST['father']."',`aadhar`='".$_POST['aadhar']."',`mobile1`='".$_POST['mobile1']."',`mobile2`='".$_POST['mobile2']."',`10school`='".$_POST['10ths']."',`10percent`='".$_POST['10pts']."',`12school`='".$_POST['12ths']."',`12percent`='".$_POST['12pts']."',`address`='".$_POST['address']."',`position`='".$_POST['position']."' WHERE `emp_id`='".$_SESSION['id']."'";
	$i=mysqli_query($conn,$sql);
	if($i)
	{	
	echo "<script>alert('Your data is successfully updated.Jump to index page.');</script>";
	}
	else
	{
		echo "<script>alert('Your data is can't be updated.');</script>";
	}
}
$sql="SELECT * FROM `emp_record` WHERE `emp_id`='".$_SESSION['id']."'";
$i=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($i)) 
			{
				$name=$row[1]; $mobile1=$row[6];$twsp=$row[13];
				$email=$row[4];$mobile2=$row[7];$add=$row[14];
				$father=$row[5];$aadhar=$row[8];$pos=$row[15];
				$tens=$row[10];$tenp=$row[11];$tws=$row[12];
				break;
			}	
mysqli_close($conn);	
	?>
		<div class="page-wrapper">
		 <!-- BREADCRUMB-->
		<div class="page-container2">
		<section class="au-breadcrumb m-t-75">
			<div class="section__content section__content--p30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="au-breadcrumb-content">
								<div class="au-breadcrumb-left">
									<span class="au-breadcrumb-span">You are here:</span>
									<ul class="list-unstyled list-inline au-breadcrumb__list">
										<li class="list-inline-item active">
											<a href="index.php">Home</a>
										</li>
										<li class="list-inline-item seprate">
											<span>/</span>
										</li>
										<li class="list-inline-item">Account Setting</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="statistic">
                <div class="section__content section__content--p30">
                    <h3>Profile Settings</h3>
					<br>
					<div class="container-fluid">
                        <div class="row">
						<div class="col-md-12 col-lg-8">
                                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" value="<?php echo $name;?>" required>
                                </div>
								<div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" value="<?php echo $email;?>" required>
                                </div>
                                <hr border='2'>
								<h3>Personal Details</h3>
								<div class="form-group">
                                    <label>Father's Name</label>
                                    <input class="au-input au-input--full" type="text" name="father" value=<?php echo $father;?> required>
                                </div>
								<div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" value=<?php echo $add;?> required>
                                </div>
								<div class="form-group">
                                    <label>Aadhar</label>
                                    <input class="au-input au-input--full" type="text" name="aadhar" value=<?php echo $aadhar;?> required>
                                </div>
								<div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="text" name="mobile1" value=<?php echo $mobile1;?> required>
                                </div>
								<div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="text" name="mobile2" value=<?php echo $mobile2;?> >
                                </div>
								<hr>
								<h3>Education Details</h3>
								<div class="form-group">
                                    <label>10th</label>
                                    <input class="au-input au-input--full" type="text" name="10ths" value=<?php echo $tens;?> required>
                                    <br><br><input class="au-input au-input--full" type="text" name="10pts" value=<?php echo $tenp;?> required>
                                </div>
								<div class="form-group">
                                    <label>12th</label>
                                    <input class="au-input au-input--full" type="text" name="12ths" value=<?php echo $twsp;?> required>
                                    <br><br><input class="au-input au-input--full" type="text" name="12pts" value=<?php echo $twsp;?> required>
                               </div>
							   <hr>
							   <div class="form-group">
                                    <label>Position</label>
                                    <input class="au-input au-input--full" type="text" name="position" value=<?php echo $pos;?> required>
                               </div>
							   <div class="form-group">
                                    <label>Upload a photo</label>
									<input type="file" name="img" id="img">
								</div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree" required>Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name='update'>Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
		<section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2019 3edge-universe,All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		</div>
	</div>
<script src="js/main.js"></script>
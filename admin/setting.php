<?php 
include_once('header.php');
$conn = mysqli_connect("localhost","root","","erm");
if (isset($_POST['update']))
{
	$sql="SELECT `password` FROM `admin` WHERE `username`='admin'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
	{
	$psw=$row[0];
	break;
	}	
	#insert into room table
	if(md5($_POST['cPassword'])==$psw)
	{
	$npsw=md5($_POST['nPassword']);
	$sql="UPDATE `admin` SET `password`='$npsw' WHERE `username`='admin'";
	$j=mysqli_query($conn,$sql);
	if($j)
	{	
	echo "<script>alert('Your data is successfully updated.Jump to index page.');</script>";
	session_destroy();
	}
	else
	{
		echo "<script>alert('Your data is can't be updated.');</script>";
	}
}else
{
	echo "<script>alert('Wrong Current Password Entered ! Try again.');</script>";
}
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
                                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" value="Admin" disabled>
                                </div>
								<div class="form-group">
                                    <label>Current Password</label>
                                    <input class="au-input au-input--full" type="Password" name="cPassword" required>
                                </div>
                                <hr border='2'>
								<div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="Password" name="nPassword" required>
                                </div>
                                
								<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree" required>You are not a robot
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
<script src="../js/main.js"></script>
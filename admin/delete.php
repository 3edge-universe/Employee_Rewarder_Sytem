<?php 
if(isset($_GET['act']))
{
	$act=$_GET['act'];
}else
{
	$act='';
}
include_once('header.php');
$conn = mysqli_connect("localhost","root","","erm");
if (isset($_POST['update']))
{
	$id=$_POST['emp_id'];
	$pos=$_POST['pos'];
	$sql="UPDATE `emp_record` SET `position`='$pos' WHERE `emp_id`='$id'";
	$j=mysqli_query($conn,$sql);
	if($j)
	{	
	echo "<script>alert('Your data is successfully updated.Jump to previous page.');</script>";
	}
	else
	{
	echo "<script>alert('Your data is can't be updated.Jump to previous page.');</script>";
	}
}
else if ($act=='delete')
{
	$id=$_GET['id'];
	$sql="DELETE FROM `emp_record` WHERE `emp_id`='$id'";
	$j=mysqli_query($conn,$sql);
	$sql2="DELETE FROM `emp_intensive` WHERE `emp_id`='$id'";
	$k=mysqli_query($conn,$sql2);
	$sql3="DELETE FROM `order` WHERE `emp_id`='$id'";
	$k=mysqli_query($conn,$sql3);
	header("Location: lc.php");
}
else if ($act=='edit')
{
	$id=$_GET['id'];
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
<?php
	$sql="SELECT `position` FROM `emp_record` WHERE `emp_id`='$id'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
	{
	$pos=$row[0];
	break;
	}
?>
		<section class="statistic">
                <div class="section__content section__content--p30">
                    <h3>Profile Settings</h3>
					<br>
					<div class="container-fluid">
                        <div class="row">
						<div class="col-md-12 col-lg-8">
                                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="form-group">
                                    <label>Emp_id</label>
                                    <input class="au-input au-input--full" name='emp_id' type="text" value="<?php echo $id;?>" disabled>
                                </div>
								<hr border='2'>
								<div class="form-group">
                                    <label>Position</label>
                                    <input class="au-input au-input--full" type="text" name="pos" value='<?php echo $pos; ?>'>
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
<?php
}
mysqli_close($conn);	
?>            
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
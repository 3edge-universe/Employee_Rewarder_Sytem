<?php 
include_once('header.php');
if(isset($_POST['button']))
	{ 
	$conn = mysqli_connect("localhost","root","","erm");
	#insert into room table
	$sql="INSERT INTO `order` VALUES ('','".$_POST['name']."','".$_POST['mobile']."','".$_POST['price']."','".$_POST['date']."','".$_SESSION['id']."')";
	$i=mysqli_query($conn,$sql);
	$sql="SELECT COUNT(DISTINCT(`mobile`)) FROM `order` where emp_id='2'";
	$l=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($l)) 
			{
				$rc=$row[0]; 
				break;
			}
	$int=$_POST['price']*0.05;
	#insert into user table
	$sql="UPDATE `emp_intensive` SET `nos`=`nos`+1,`rc`=$rc,`intensive`=`intensive`+$int WHERE `emp_id`='".$_SESSION['id']."'";
	$k=mysqli_query($conn,$sql);
	if($i)
	{	
		echo "<script>alert('Your Order is placed successfully.'); </script>";
	}
	else
	{
		echo "<script>alert('An error Occured, Try again'); </script>";
	}
	mysqli_close($conn);
	}
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
										<li class="list-inline-item">Order Page</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END BREADCRUMB-->
            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <form action="" method="post">
                                <div class="form-group">
                                    <label>Customer's Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="name" required>
                                </div>
								<div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="text" name="mobile" placeholder="mobile" required>
                                </div>
								<div class="form-group">
                                    <label>Price</label>
                                    <input class="au-input au-input--full" type="text" name="price" placeholder="Price" required>
                                </div>
								<div class="form-group">
                                    <label>Date</label>
                                    <input class="au-input au-input--full" type="date" name="date" placeholder="date" required>
                                </div>
								<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree" required>You are not a Robot?
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name='button'>Place Order</button>
                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
            
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
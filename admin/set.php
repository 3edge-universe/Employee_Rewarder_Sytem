<?php 
include_once('header.php');
$conn = mysqli_connect("localhost","root","","erm");
if (isset($_POST['update']))
{
	$sql="UPDATE `admin` SET `target_sale`='".$_POST['nos']."',`target_cust`='".$_POST['lc']."' WHERE `username`='admin'";
	$j=mysqli_query($conn,$sql);
	if($j)
	{	
	echo "<script>alert('Your data is successfully updated.');</script>";
	}
	else
	{
		echo "<script>alert('Your data is can't be updated.');</script>";
	}
}
	$sql="SELECT * FROM `admin`";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
			{
				$nos=$row[5]; 
				$lc=$row[6];
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
										<li class="list-inline-item">Set Target</li>
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
                    <h3>Set Target</h3>
					<br>
					<div class="container-fluid">
                        <div class="row">
						<div class="col-md-12 col-lg-8">
                                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="form-group">
                                    <label>No of orders</label>
                                    <input class="au-input au-input--full" type="text" name="nos" value=<?php echo $nos; ?>>
                                </div>
                                <hr border='2'>
								<div class="form-group">
                                    <label>No of Loyal Customers</label>
                                    <input class="au-input au-input--full" type="text" name="lc" value=<?php echo $lc; ?> >
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
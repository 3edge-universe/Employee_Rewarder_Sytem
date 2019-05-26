<?php 
include_once('header.php');
	if(isset($_GET['cal']))
	{
	$conn = mysqli_connect("localhost","root","","erm");
	$sql="SELECT * FROM `emp_intensive` WHERE `emp_id`='".$_SESSION['id']."'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
			{
				$nos=$row[1]; 
				$rc=$row[2];
				$int=$row[3];
				break;
			}
		$totali=$nos*0.05+$rc*0.1;
	mysqli_close($conn);
	}
	else
	{
		$totali=0;
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
										<li class="list-inline-item">Bonus Details</li>
										<li class="list-inline-item seprate">
											<span>/</span>
										</li>
										<li class="list-inline-item">Intensive</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END BREADCRUMB-->
<?php 
	$conn = mysqli_connect("localhost","root","","erm");
	$sql="SELECT * FROM `emp_intensive` WHERE `emp_id`='".$_SESSION['id']."'";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
			{
				$nos=$row[1]; 
				$rc=$row[2];
				$int=$row[3];
				break;
			}
	$sql="SELECT `target_sale`, `target_cust` FROM `admin`";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
			{
				$ts=$row[0]; 
				$tc=$row[1];
				break;
			}
			$nocp=$nos/$ts*100;
			$rcp=$rc/$tc*100;
	mysqli_close($conn);
?>
            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $rc;?></h2>
                                    <span class="desc">Loyal Customer</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $nos;?></h2>
                                    <span class="desc">items sold</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">$<?php echo $int;?></h2>
                                    <span class="desc">total earnings</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


		<section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">Intensive Details</h3><br>
									<div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Total sales</th>
												<th>Total Intensive</th>
												<th>Total Loyal Customer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<tr>
                                        <td><?php echo $nos; ?></td>
										<td><?php echo $int; ?></td>
										<td><?php echo $rc; ?></td>
										</tr>
										<tr>
											<td colspan='3'>
											<center>
											<a type="button" class="btn btn-success" href='intense.php?cal=true'>
                                            <i class="fa fa-magic"></i>&nbsp; Calculate</a>
											</center>
											</td>
										</tr>
										<tr>
											<td>
											Total Intensive Amount Is:
											</td>
											<td>
											<?php 
											echo $totali;
											?>
											</td>
										</tr>
									</tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- END RECENT REPORT 2             -->
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
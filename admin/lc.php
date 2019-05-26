<?php 
include_once('header.php');
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
										<li class="list-inline-item">Features</li>
										<li class="list-inline-item seprate">
											<span>/</span>
										</li>
										<li class="list-inline-item">Sales</li>
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
	$sql="SELECT sum(`nos`),sum(`rc`) FROM `emp_intensive`";
	$i=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($i)) 
			{
				$nos=$row[0]; 
				$rc=$row[1];
				break;
			}
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
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
<?php 
	$conn = mysqli_connect("localhost","root","","erm");
	$sql="SELECT * FROM `emp_record`";
	$i=mysqli_query($conn,$sql);
?>				
		<section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">Manage Employee</h3><br>
									<div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Emp_id ID</th>
                                                <th>Name</th>
												<th>Username</th>
												<th>Email</th>
												<th class="text-right">Action</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php	while($row = mysqli_fetch_array($i)) 
										{
                                        echo "<tr>";
                                        echo "<td>$row[0]</td>";
										echo "<td>$row[1]</td>";
										echo "<td>$row[2]</td>";
                                        echo "<td>$row[4]</td>";
										echo "<td><a class='btn btn-success' href='delete.php?id=$row[0]&act=edit'>Edit</a></td>";
										echo "<td><a class='btn btn-warning' href='delete.php?id=$row[0]&act=delete'>DELETE</a></td>";
										echo "</tr>";
										}
								mysqli_close($conn);
									?>
										
										
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
<script src="../js/main.js"></script>
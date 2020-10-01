<section class="content-header">
   <h1>Dashboard</h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$users=mysqli_query($Open,"SELECT * FROM tb_user");
	$jmlusers = mysqli_num_rows($users);
	
	$approve=mysqli_query($Open,"SELECT * FROM tb_mohoncuti WHERE persetujuan='DISETUJUI' OR persetujuan='TIDAK DISETUJUI'");
	$jmlapprove = mysqli_num_rows($approve);
	
	$wait=mysqli_query($Open,"SELECT * FROM tb_mohoncuti WHERE persetujuan=''");
	$jmlwait = mysqli_num_rows($wait);
	
	$password=mysqli_query($Open,"SELECT * FROM tb_password");
	$jmlpassword = mysqli_num_rows($password);
?>
<section class="content">
    <div class="row">
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?=$jmlusers?></h3>
					<p>Jumlah Users</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<p class="small-box-footer">Users <i class="fa fa-arrow-circle-right"></i></p>
			</div>
        </div>
        <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?=$jmlpassword?></h3>
					<p>User & Password</p>
				</div>
				<div class="icon">
					<i class="ion ion-person"></i>
				</div>
				<p class="small-box-footer">User & Password <i class="fa fa-arrow-circle-right"></i></p>
			</div>
        </div>
    </div>
</section>

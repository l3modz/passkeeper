<section class="content-header">
    <h1>Delete<small>Data Password</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Delete Data Password</li>
    </ol>
</section>
<div class="register-box">
<?php
include "dist/koneksi.php";
if (isset($_GET['judul'])) {
	$judul = $_GET['judul'];
	$query   = "SELECT * FROM tb_password WHERE judul='$judul'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if (!empty($judul) && $judul != "") {
		$delete = "DELETE FROM tb_password WHERE judul='$judul'";
		$sqldel = mysqli_query ($Open,$delete);
		
		//$deluser = "DELETE FROM tb_user WHERE id_user='$nip'";
		//$sql = mysqli_query ($Open,$deluser);
		
		if ($sqldel) {		
			echo "<div class='register-logo'><b>Delete</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Data Password ".$judul." Berhasil di Hapus</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-primary btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";		
		}
		else{
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";	
		}
	}
	mysql_close($Open);
?>
</div>
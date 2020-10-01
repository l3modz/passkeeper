<section class="content-header">
    <h1>Edit<small>Data Users</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Data Users</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_user'])) {
	$user = $_GET['id_user'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$tampilusers	= mysqli_query($Open,"SELECT * FROM tb_user WHERE id_user='$user'");
	$hasil	= mysqli_fetch_array ($tampilusers);
				
	if ($_POST['edit'] == "edit") {
		$id_user	=$_POST['id_user'];
		$nama_user	=$_POST['nama_user'];
		$password	=$_POST['password'];
		$passwd     =md5($password);

		
		$update= mysqli_query ($Open,"UPDATE tb_user SET id_user='$id_user', nama_user='$nama_user', password='$passwd' WHERE id_user='$user'");
		if($update){
			echo "<div class='register-logo'><b>Edit</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Edit Data Users ".$id_user." Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-primary btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
?>
</div>
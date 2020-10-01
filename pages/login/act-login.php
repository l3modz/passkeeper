<div class="login-box">
<?php
	include "dist/koneksi.php";
	$id_user		= $_POST['id_user'];
	$password		= $_POST['password'];
	$op 			= $_GET['op'];
	$lastlog		= $_POST['lastlog'];
	
	if($op=="in"){
		$querylogin = "SELECT * FROM tb_user WHERE id_user='$id_user' AND password=MD5('$password')";
		$sql = mysqli_query($Open,"SELECT * FROM tb_user WHERE id_user='$id_user' AND password=MD5('$password')");
		//$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($sql)==1){
			$qry = mysqli_fetch_array($sql);
			$_SESSION['id_user'] = $qry['id_user'];
			$_SESSION['nama_user'] = $qry['nama_user'];
			$_SESSION['hak_akses'] = $qry['hak_akses'];
			
			if($qry['aktif']=="N"){
            echo "<div class='register-logo'><b>Oops!</b> User Tidak Aktif.</div>	
				<div class='register-box-body'>
					<p>Harap tunggu beberapa saat, atau silahkan hubungi Admin Anda.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
			}
			else if($qry['hak_akses']=="Admin"){
				$sqlLog = mysqli_query($Open,"UPDATE tb_user SET lastlogin='$lastlog' WHERE id_user='$id_user' AND password=MD5('$password')");
				if($sqlLog){
				header("location:home-admin.php");
				}
				else {
					echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
				}
			}
			else if($qry['hak_akses']=="Pegawai"){
				$sqlLog = mysqli_query($Open,"UPDATE tb_user SET lastlogin='$lastlog' WHERE id_user='$id_user' AND password=MD5('$password')");
				if($sqlLog){
				header("location:home-pegawai.php");
				}
				else {
					echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
				}
			}
			else if($qry['hak_akses']=="staff"){
				$sqlLog = mysqli_query($Open,"UPDATE tb_user SET lastlogin='$lastlog' WHERE id_user='$id_user' AND password=MD5('$password')");
				if($sqlLog){
				header("location:home-staff.php");
				}
				else {
					echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
				}
			}
		}
		else{
			echo "<div class='register-logo'><b>Oops!</b> Login Failed.</div>	
				<div class='register-box-body'>
					<p>User atau Password tidak sesuai. Silahkan diulang kembali.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
		}
	}else if($op=="out"){
		unset($_SESSION['id_user']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	}
?>
</div>

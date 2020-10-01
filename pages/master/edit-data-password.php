<section class="content-header">
    <h1>Edit<small>Data Password</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Data Password</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['judul'])) {
	$nip = $_GET['judul'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	////////////////////


	//17.08.2020 | 03.54 pagi , done
	function encrypt_decrypt($action, $string) {
	include "dist/koneksi.php";

    	// hash
   	 $key = hash('sha256', $secret_key);
    
    	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    	$iv = substr(hash('sha256', $secret_iv), 0, 16);
    	if ( $action == 'encrypt' ) {
        	$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        	$output = base64_encode($output);
    	} else if( $action == 'decrypt' ) {
        	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    	}
    		return $output;
	}
////////////////////
	$tampilPassword	= mysqli_query($Open,"SELECT * FROM tb_password WHERE judul='$nip'");
	$hasil	= mysqli_fetch_array ($tampilPassword);
				
	if ($_POST['edit'] == "edit") {
		$judul		=$_POST['judul'];
		$id_user	=$_POST['id_user'];
		$passwd		=$_POST['passwd'];
		$password	=encrypt_decrypt('encrypt', $passwd);
		$kategori	=$_POST['kategori'];
		$url		=$_POST['url'];
		$deskripsi	=$_POST['deskripsi'];
		
		$update= mysqli_query ($Open,"UPDATE tb_password SET judul='$judul', id_user='$id_user', passwd='$password', kategori='$kategori', url='$url', deskripsi='$deskripsi' WHERE judul='$nip'");
		if($update){
			echo "<div class='register-logo'><b>Edit</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Edit Data Pegawai ".$nip." Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-primary btn-block btn-flat'>Next >></button>
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

<section class="content-header">
    <h1>Input<small>Data Password</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Input Data Password</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$judul		=$_POST['judul'];
	$id_user	=$_POST['id_user'];
	//$passwd		=$_POST['passwd'];
	$kategori	=$_POST['kategori'];
	$url		=$_POST['url'];
	$deskripsi	=$_POST['deskripsi'];
	

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '0c5d3c1e26e00f79356db63c97b7e4ae';
    $secret_iv = '3ed9b95e4b6f2c345836def81e570ef1';
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
$passwd		= $_POST['passwd'];
$password	= encrypt_decrypt('encrypt', $passwd);

	include "dist/koneksi.php";
	
		$cekuser	=mysqli_num_rows (mysqli_query($Open,"SELECT judul FROM tb_password WHERE judul='$_POST[judul]'"));
	
		if (empty($_POST['judul']) || empty($_POST['id_user']) || empty($_POST['passwd']) || empty($_POST['kategori']) || empty($_POST['url']) || empty($_POST['deskripsi'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else if($cekuser > 0) {
		echo "<div class='register-logo'><b>Oops!</b> Judul Not Available</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan Judul yang Anda masukan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		//convert $password to MD5
		//$passmd5 = md5($password);
		$insert00 = "INSERT INTO tb_password (judul, id_user, passwd, kategori, url, deskripsi) VALUES ('$judul', '$id_user', '$password', '$kategori', '$url', '$deskripsi')";
		$query00 = mysqli_query ($Open,$insert00);
		
		if($query00){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data User & Password Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>

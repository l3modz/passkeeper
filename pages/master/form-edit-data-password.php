<?php
	if (isset($_GET['judul'])) {
	$judul = $_GET['judul'];
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


	$ambilData=mysqli_query($Open,"SELECT * FROM tb_password WHERE judul='$judul' AND passwd != ''");
	$hasil=mysqli_fetch_array($ambilData);
		$judul = $hasil['judul'];
?>
<section class="content-header">
    <h1>Form<small>Edit Data Password <b><?php echo $judul; ?></b></small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Data Password</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=edit-data-password&judul=<?php echo $judul?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">Judul</label>
							<div class="col-sm-7">
								<input type="text" name="judul" class="form-control" value="<?php echo $hasil['judul'];?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">id User</label>
							<div class="col-sm-7">
								<input type="text" name="id_user" class="form-control" value="<?php echo $hasil['id_user'];?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-7">
								<input type="text" name="passwd" class="form-control" value="<?php echo encrypt_decrypt('decrypt', $hasil['passwd']);?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kategori</label>
							<div class="col-sm-7">
								<input type="text" name="kategori" class="form-control" value="<?php echo $hasil['kategori'];?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">URL/Link</label>
							<div class="col-sm-7">
								<input type="text" name="url" class="form-control" value="<?php echo $hasil['url'];?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Deskripsi</label>
							<div class="col-sm-7">
								<input type="text" name="deskripsi" class="form-control" value="<?php echo $hasil['deskripsi'];?>" maxlength="164">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" name="edit" value="edit" class="btn btn-danger">Simpan</button> <?php echo "<button type='button' onclick=location.href='home-admin.php?page=form-master-password' class='btn btn-danger'>Back</button>"; ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- datepicker -->
<script type="text/javascript" src="plugins/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
	 $('.form_date').datetimepicker({
			language:  'id',
			weekStart: 1,
			todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
		});
</script>

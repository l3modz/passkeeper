<?php
	if (isset($_GET['id_user'])) {
	$user = $_GET['id_user'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysqli_query($Open,"SELECT * FROM tb_user WHERE id_user='$user'");
	$hasil=mysqli_fetch_array($ambilData);
		$user = $hasil['id_user'];
?>
<section class="content-header">
    <h1>Form<small>Edit Data Users <b><?php echo $user; ?></b></small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Data Users</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=edit-data-users&id_user=<?php echo $user?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">ID User</label>
							<div class="col-sm-7">
								<input type="text" name="id_user" class="form-control" value="<?php echo $hasil['id_user'];?>" maxlength="125">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama</label>
							<div class="col-sm-7">
								<input type="text" name="nama_user" class="form-control" value="<?php echo $hasil['nama_user'];?>" maxlength="125">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-7">
								<input type="text" name="password" class="form-control" value=" " maxlength="225"> Password harus di backspace dulu..
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" name="edit" value="edit" class="btn btn-danger">Simpan</button> <?php echo "<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-danger'>Back</button>"; ?>
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

<section class="content-header">
    <h1>Master<small>Data Password</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Password</li>
    </ol>
</section>
<?php


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



	
	$tampilPassword=mysqli_query($Open,"SELECT * FROM tb_password WHERE passwd != ''");
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Add Data Password<a data-toggle="collapse" data-target="#formpasswd" href="#formpasswd" class="collapsed"></a></h4>
							</div>
							<div id="formpasswd" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-admin.php?page=master-password" class="form-horizontal" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-3 control-label">Judul</label>
											<div class="col-sm-7">
												<input type="text" name="judul" class="form-control" placeholder="Judul" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">id User</label>
											<div class="col-sm-7">
												<input type="text" name="id_user" class="form-control" placeholder="id user" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-7">
												<input type="text" name="passwd" class="form-control" placeholder="Password" maxlength="164">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Kategori</label>
											<div class="col-sm-7">
												<input type="text" name="kategori" class="form-control" placeholder="Kategori" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">URL/Link</label>
											<div class="col-sm-7">
												<input type="text" name="url" class="form-control" placeholder="URL" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Deskripsi</label>
											<div class="col-sm-7">
												<input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" maxlength="164">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-7">
												<button type="submit" name="save" value="save" class="btn btn-danger">Save</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Judul</th>
								<th>id User</th>
								<th>Password</th>
								<th>Kategori</th>
								<th>URL/Link</th>
								<th>Deskripsi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						//17.08.2020|3.48 : pusing ndak mau row all data
						//17.08.2020 | 03.54 pagi , done
							//while($password=mysqli_fetch_array($tampilPassword)){
						//while($password=mysqli_fetch_assoc($tampilPassword)){
							
						//if ($tampilPassword) {

    						//$password = $tampilPassword->fetch_row();

						while (null !== ($password = $tampilPassword->fetch_assoc())) {


//$encrypted_txt = $pegawai['nama'];
//$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);

						?>	
							<tr>
								<td><?php echo $password['judul'];?></td>
								<td><?php echo $password['id_user'];?></td>
								<td><?php echo encrypt_decrypt('decrypt', $password['passwd']);?></td>
								<td><?php echo $password['kategori'];?></td>
								<td><?php echo $password['url'];?></td>
								<td><?php echo $password['deskripsi'];?></td>
								<td align="center"><i class="fa  fa-refresh"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=form-edit-data-password&judul=<?php echo $password['judul'];?>" title="edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=delete-data-password&judul=<?php echo $password['judul'];?>" title="delete"><i class="fa fa-trash-o"></i></a></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
        </div>
	</div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

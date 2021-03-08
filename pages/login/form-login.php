<div class="login-box">
	<div class="login-logo">
		<a href="index.php"><b>LOGIN</b></a>
	</div>
	<div class="box box-primary">
		<div class="login-box-body">
			<p class="login-box-msg">Silahkan login dengan akun Anda</p>
			<form action="index.php?page=act-login&op=in" method="POST">
				<div class="form-group has-feedback">
					<input type="text" name="id_user" class="form-control" placeholder="User Name"><span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" id="hide"><i class="fas fa-eye-slash eye glyphicon glyphicon-lock" onclick="myFunction()"></i>
<script>
function myFunction() {
  var x = document.getElementById("hide");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

				</div>
				<?php
				date_default_timezone_set("Asia/Jakarta");
				$lastlog =date("Y-m-d h:i:sa");
				?>
				<input type="hidden" name="lastlog" value="<?php echo $lastlog; ?>">
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-danger btn-block btn-flat">Login</button>
						<script src="script.js" defer></script>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

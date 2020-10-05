<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>/images/icon.png">
  <title>Gerbang Demokrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<div class="card card-primary">
<?php if ($session !=NULL){?>
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title col-sm-12">LOGIN GAGAL USERNAME/PASSWORD SALAH</h3>
        </div>
    </div>
    <?php }else{}?>
<div class="col-md-9">
<br>
<div class="card-body">
	<body class="hold-transition login-page">
		<div class="row">
		<!-- left card -->
			<div class="col-md-5">
				<div class="form-group row">
					<div class="card-body">
					<!-- /.login-logo -->
					<div class="card">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title col-sm-12"><center>LOGIN ADMIN</h3> 
							</div> 
						</div>
						<div class="card-body login-card-body">
							<form action="/admin/login" method="post">
							<?= csrf_field() ?>
								<div class="input-group mb-3">
									<input required type="text" name="username" class="form-control" placeholder="Username">
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-user"></span>
										</div>
									</div>
								</div>
							<div class="input-group mb-3">
								<input required type="password" name="password" class="form-control" placeholder="Password">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<div class="icheck-primary">
									<input type="checkbox" id="remember">
									<label for="remember">
										Remember Me
									</label>
									</div>
								</div>
							<div class="col-4">
								<button type="submit" class="btn btn-primary btn-block">LogIn</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-1">
    <div class="form-group row">
		<div class="login-logo">
			<img src = "<?= base_url()?>/images/logo.png" style = "margin-top:30px">
		</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/dist/js/adminlte.min.js"></script>

</body>
</html>

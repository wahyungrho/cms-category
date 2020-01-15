<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Cms Category</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('aset/images/icons/telunjuk.jpg') ?> "/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/bootstrap/css/bootstrap.min.css') ?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/fonts/iconic/css/material-design-iconic-font.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/select2/select2.min.css') ?> ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/vendor/daterangepicker/daterangepicker.css') ?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/css/util.css') ?> ">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('aset/css/main.css') ?> ">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo site_url('admin/cmsCategory/login') ?>">
					<span class="login100-form-title p-b-26">
    					<h2 class="navbar-brand mr-1" href="<?php echo site_url('admin')?>"><img src="<?php echo base_url(); ?>assets/img/telunjuk.png" style="width: 165px; "></h2>
						
					</span>
					<p class="login100-form p-b-40">
						
						<?php if ($this->session->flashdata('message')) {
							echo $this->session->flashdata('message');
						} ?>
						</p>
					

					<div class="wrap-input100 validate-input" data-validate="Enter Username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn m-t-100">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-50">
						<span class="txt1">
							<!-- Don’t have an account? -->
						</span>

						<a class="txt2" href="#">
							<!-- Sign Up -->
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/jquery/jquery-3.2.1.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/animsition/js/animsition.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/bootstrap/js/popper.js') ?> "></script>
	<script src="<?php echo base_url('aset/vendor/bootstrap/js/bootstrap.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/select2/select2.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/daterangepicker/moment.min.js') ?> "></script>
	<script src="<?php echo base_url('aset/vendor/daterangepicker/daterangepicker.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/vendor/countdowntime/countdowntime.js') ?> "></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('aset/js/main.js') ?> "></script>

</body>
</html>
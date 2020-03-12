<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $judul ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

	<!-- Disable tap highlight on IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<link href="<?= base_url() ?>css/main.87c0748b313a1dda75f5.css" rel="stylesheet">
	<script type="text/javascript" src="<?= base_url() ?>assets/scripts/main.87c0748b313a1dda75f5.js"> </script>
</head>

<body>
	<div class="app-container app-theme-white body-tabs-shadow">
		<div class="app-container">
			<div class="h-100 bg-plum-plate bg-animation">
				<div class="d-flex h-100 justify-content-center align-items-center">
					<div class="mx-auto app-login-box col-md-8">
						<div class="app-logo-inverse mx-auto mb-3"></div>
						<div class="modal-dialog w-100 mx-auto">
							<div class="modal-content">
								<div class="modal-body">
									<div class="h5 modal-title text-center">
										<h4 class="mt-2">
											<div>Selamat Datang</div>
											<span>Masukkan Username dan Password</span>
										</h4>
									</div>
									<form action="<?= base_url() ?>login/aksi_login" method="POST">
										<?php
										$csrf = array(
											'name' => $this->security->get_csrf_token_name(),
											'hash' => $this->security->get_csrf_hash()
										);
										?>
										<input name="username" type="text" class="position-relative form-group form-control" placeholder="Username">
										<input name="password" type="password" class="position-relative form-group form-control" placeholder="Password">
										<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

										<?php
										if (isset($_GET['pesan'])) {
											if ($_GET['pesan'] == "gagal") {
												echo "<div class='alert alert-danger' role='alert'>Username Atau Password Salah</div> ";
											}
										}
										?>

								</div>
								<div class="modal-footer clearfix">
									<div class="float-right">
										<button type="submit" class="btn btn-primary btn-lg" name="btn-login" value="Login">Login</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
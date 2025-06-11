<!DOCTYPE html>
<?php


include "../function.php";
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] == 1) {
		header("location: test.php");
	}
} else {
	header("location:index.php");
}

$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE role = '1'");

$jumlahUser = mysqli_query($koneksi, "SELECT COUNT('id_user') as jml_user FROM user WHERE role='1'");
$user = mysqli_fetch_assoc($jumlahUser);

$jumlahKerusakan = mysqli_query($koneksi, "SELECT COUNT('id_kerusakan') as jml_kerusakan FROM ms_kerusakan");
$kerusakan = mysqli_fetch_assoc($jumlahKerusakan);

$jumlahGejala = mysqli_query($koneksi, "SELECT COUNT('id_gejala') as jml_gejala FROM ms_gejala");
$gejala = mysqli_fetch_assoc($jumlahGejala);

$jumlahSolusi = mysqli_query($koneksi, "SELECT COUNT('id_solusi') as jml_solusi FROM solusi");
$solusi = mysqli_fetch_assoc($jumlahSolusi);


?>
<html lang="en">

<head>
	<?php include 'layout/head.php' ?>
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<?php include 'layout/header.php' ?>
			<!-- sidebar -->
			<?php include 'layout/sidebar.php' ?>
			<!-- endsidear -->
			<!-- main-content -->
			<div class="main-content">
				<section class="section">
					<div class="row">
						<div class="col-lg-3">
							<div class="card border-left-primary shadow  py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data User</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user['jml_user']; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card border-left-primary shadow  py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Kerusakan</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kerusakan['jml_kerusakan']; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card border-left-primary shadow  py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Gejala Kerusakan</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $gejala['jml_gejala']; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3">
							<div class="card border-left-primary shadow  py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Solusi</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $solusi['jml_solusi']; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="section-body">
						<?php include 'config.php' ?>

						<!-- <h2 class="section-title">This is Example Page</h2>
						<p class="section-lead">This page is just an example for you to create your own page.</p>
						<div class="card">
							<div class="card-header">
								<h4>Example Card</h4>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<div class="card-footer bg-whitesmoke">
								This is card footer
							</div>
						</div> -->
					</div>
				</section>
			</div>
			<!-- end main -->
			<!-- footer -->
			<?php include 'layout/footer.php' ?>
			<!-- endfooter -->
		</div>

	</div>
</body>

</html>
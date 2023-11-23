<html>

<head>
	<title>PBO UTS</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="/mvc_native/assets/img/logo.png" width="100px">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Disabled</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<div class="col-md-4">
					<h3>Data Mahasiswa</h3>
					<button class="btn btn-primary" lass="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah</button>
					<table class="mt-2 table table-responsive table-bordered table-striped">
						<tr>
							<td>No</td>
							<td>Nama</td>
							<td>NPM</td>
							<td>Action</td>
						</tr>
						<?php
						foreach ($rs as $mahasiswa => $list) {
						?>
							<tr>
								<td><a href="?act=tampil-data&i=<?= $list['id'] ?>"><?= $list['id'] ?></a></td>
								<td><?= $list['nama'] ?></td>
								<td><?= $list['npm'] ?></td>
								<td><a href="?act=hapus-data&i=<?= $list['id'] ?>"><button class="btn btn-sm btn-danger">Hapus</button></a></td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal tambah -->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="?act=simpan">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
						</div>
						<div class="mb-3">
							<label class="form-label">Nomor NPM</label>
							<input type="text" class="form-control" placeholder="Masukkan NPM" name="npm">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Mahasiswa</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
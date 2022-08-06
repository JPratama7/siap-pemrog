<div class="container pt-5">
	<h3><?= $title ?></h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb ">
			<li class="breadcrumb-item"><a>Matakuliah</a></li>
			<li class="breadcrumb-item "><a href="<?= base_url('mk'); ?>">List Data</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Data</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">

					<form action="<?= base_url('MK/add'); ?>" method="post">
						<div class="form-group row">
							<label for="id_mk" class="col-sm-2 col-form-label">ID</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="id_mk" name="id_mk"
									   value="<?= set_value('id_mk'); ?>">
								<small class="text-danger">
									<?php echo form_error('id_mk') ?>
								</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama Matakuliah</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="nama" name="nama"
									   value="<?= set_value('nama'); ?>">
								<small class="text-danger">
									<?php echo form_error('nama') ?>
								</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="sks" class="col-sm-2 col-form-label">SKS</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sks" name="sks"
									   value=" <?= set_value('sks'); ?>">
								<small class="text-danger">
									<?php echo form_error('sks') ?>
								</small>
							</div>
						</div>


						<div class="form-group row">
							<label for="kkm" class="col-sm-2 col-form-label">KKM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="kkm" name="kkm"
									   value=" <?= set_value('kkm'); ?>">
								<small class="text-danger">
									<?php echo form_error('kkm') ?>
								</small>
							</div>
						</div>


				</div>

				<div class="form-group row">
					<div class="col-sm-10 offset-md-2">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

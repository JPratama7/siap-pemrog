<div class="container pt-5">
	<h3>Kelas</h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb ">
			<li class="breadcrumb-item"><a>Kelas</a></li>
			<li class="breadcrumb-item "><a href="<?= base_url('kelas'); ?>">List Data</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Data</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('kelas/add'); ?>" method="post">
						<div class="form-group row">
							<label for="id_kelas" class="col-sm-2 col-form-label">ID</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="id_kelas" name="id_kelas"
									   value="<?= set_value('id_kelas'); ?>">
								<small class="text-danger">
									<?php echo form_error('id_kelas') ?>
								</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="id_wali" class="col-sm-2 col-form-label">ID wali</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="id_wali" name="id_wali"
									   value="<?= set_value('id_wali'); ?>">
								<small class="text-danger">
									<?php echo form_error('id_wali') ?>
								</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="id_jurusan" class="col-sm-2 col-form-label">jurusan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="id_jurusan" name="id_jurusan"
									   value="<?= set_value('id_jurusan'); ?>">
								<small class="text-danger">
									<?php echo form_error('id_jurusan') ?>
								</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="tahunid" class="col-sm-2 col-form-label">Tahunid</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="tahunid" name="tahunid"
									   value="<?= set_value('tahunid'); ?>">
								<small class="text-danger">
									<?php echo form_error('tahunid') ?>
								</small>
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
</div>

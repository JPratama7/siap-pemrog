<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Nilai</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('nilai'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                <form action="<?= base_url('nilai/add'); ?>" method="post">
                <div class="form-group row">
                        <label for="id_nilai" class="col-sm-2 col-form-label">id_nilai</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_nilai" name="id_nilai" value="<?= set_value('id_nilai'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_nilai') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_matkul" class="col-sm-2 col-form-label">ID id_matkul</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_kelas" name="id_matkul" value="<?= set_value('id_matkul'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_matkul') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npm" name="npm" value=" <?= set_value('npm'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('npm') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nilai" name="nilai" value=" <?= set_value('nilai'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nilai') ?>
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
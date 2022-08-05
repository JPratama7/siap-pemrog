<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jurusan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jurusan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                <form action="<?= base_url('jurusan/add'); ?>" method="post">
                <div class="form-group row">
                        <label for="id_jurusan" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_jurusan" name="id_jurusan" value="<?= set_value('id_jurusan'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_jurusan') ?>
                            </small>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?= set_value('nama'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
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
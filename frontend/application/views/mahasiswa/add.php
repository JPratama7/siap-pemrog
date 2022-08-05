<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mahasiswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                <form action="<?= base_url('mahasiswa/add'); ?>" method="post">
                <div class="form-group row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="npm" name="npm" value="<?= set_value('npm'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('npm') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">ID KELAS</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?= set_value('id_kelas'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_kelas') ?>
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

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jk" name="jk" value="l"
                                        <?php if (set_value('jk') == "l") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jk">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jk" name="jk" value="p"
                                        <?php if (set_value('jk') == "p") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jk">
                                        Perempuan
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('jk') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value=" <?= set_value('alamat'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value=" <?= set_value('tgl_lahir'); ?>">

                            <small class="text-danger">
                                <?php echo form_error('tgl_lahir') ?>
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
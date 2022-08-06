<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jadwal'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="id_jadwal" class="col-sm-2 col-form-label">id_jadwal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value=" <?= $data_jadwal['id_jadwal']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_jadwal') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">ID KELAS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_kelas" name="id_kelas" value=" <?= $data_jadwal['id_kelas']; ?>" >
                            <small class="text-danger">
                                <?php echo form_error('id_kelas') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_dosen" class="col-sm-2 col-formlabel">ID Dosen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_dosen" name="id_dosen" value=" <?= $data_jadwal['id_dosen']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_dosen') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-formlabel">Tanggal </label>
                        <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value=" <?= set_value('tanggal'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mulai" class="col-sm-2 col-formlabel">mulai </label>
                        <div class="col-sm-8">
                        <input type="time" class="form-control" id="mulai" name="mulai" value=" <?= set_value('mulai'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('mulai') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selesai" class="col-sm-2 col-formlabel">Selesai </label>
                        <div class="col-sm-8">
                        <input type="time" class="form-control" id="selesai" name="selesai" value=" <?= set_value('selesai'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('selesai') ?>
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

<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mahasiswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">List Data</a></li>
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
                        <label for="id_kelas" class="col-sm-2 col-form-label">id_kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_kelas" name="id_kelas" value=" <?= $data_kelas['id_kelas']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_kelas') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_wali" class="col-sm-2 col-form-label">id_wali</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_wali" name="id_wali" value=" <?= $data_kelas['id_wali']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_wali') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label">jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value=" <?= $data_kelas['jurusan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('jurusan') ?>
                            </small>
                        </div>
                    </div>
                
                   
                    <div class="form-group row">
                        <label for="tahunid" class="col-sm-2 col-formlabel">tahunid</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tahunid" name="tahunid" value=" <?= set_value('tahunid'); ?>">
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
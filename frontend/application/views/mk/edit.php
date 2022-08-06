<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Matakuiah</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('MK'); ?>">List Data</a></li>
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
                        <label for="id_mk" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_mk" name="id_mk" value=" <?= $data_mk['id_mk']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_mk') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?= $data_mk['nama']; ?>" >
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sks" class="col-sm-2 col-formlabel">sks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sks" name="sks" value=" <?= $data_mk['sks']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('sks') ?>
                            </small>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="kkm" class="col-sm-2 col-formlabel">kkm</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kkm" name="kkm" rows="3"><?= $data_mk['kkm']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('kkm') ?>
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

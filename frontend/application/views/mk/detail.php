<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Matakuliah</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mk'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID :</b><br><?= $data_mk['id_mk']; ?></h5>
                    <p class="card-text"><b>Nama Matakuliah :</b><br><?= $data_mk['nama']; ?></p>
                    <p class="card-text"><b>sks :</b><br><?= $data_mk['sks']; ?></p>
                    <p class="card-text"><b>kkm :</b><br><?= $data_mk['kkm']; ?></p>
                    
                    <p></p>
                    <a href="<?= base_url(); ?>mk" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
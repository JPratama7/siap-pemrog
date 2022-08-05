<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Kelas</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('kelas'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Kelas
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID :</b><br><?= $data_kelas['id_kelas']; ?></h5>
                    <p class="card-text"><b>ID Wali :</b><br><?= $data_kelas['id_wali']; ?></p>
                    <p class="card-text"><b>Jurusan :</b><br><?= $data_kelas['jurusan']; ?></p>

                    <p class="card-text"><b>Tahunid :</b><br><?= $data_kelas['tahunid']; ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>kelas" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
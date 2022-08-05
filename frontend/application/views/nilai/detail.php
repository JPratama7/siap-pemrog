<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Nilai</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('nilai'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data nilai
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>id_nilai :</b><br><?= $data_jadwal['id_nilai']; ?></h5>
                    <p class="card-text"><b> id_matkul :</b><br><?= $data_jadwal['id_matkul']; ?></p>
                    <p class="card-text"><b>npm :</b><br><?= $data_jadwal['npm']; ?></p>
                    <p class="card-text"><b>nilai :</b><br><?= $data_jadwal['nilai']; ?></p>
                  

                    <p></p>
                    <a href="<?= base_url(); ?>nilai" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
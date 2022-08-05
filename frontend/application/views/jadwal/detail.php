<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jadwal'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data jadwal
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>id_jadwal :</b><br><?= $data_jadwal['id_jadwal']; ?></h5>
                    <p class="card-text"><b> id_kelas :</b><br><?= $data_jadwal['id_kelas']; ?></p>
                    <p class="card-text"><b>id_dosen :</b><br><?= $data_jadwal['id_dosen']; ?></p>
                    <p class="card-text"><b>tanggal :</b><br><?= $data_jadwal['tanggal']; ?></p>
                    <p class="card-text"><b>mulai :</b><br><?= $data_jadwal['mulai']; ?></p>
                    <p class="card-text"><b>selesai :</b><br><?= $data_jadwal['selesai']; ?></p>

                    <p></p>
                    <a href="<?= base_url(); ?>jadwal" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
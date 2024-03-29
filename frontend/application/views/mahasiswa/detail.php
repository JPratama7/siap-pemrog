<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mahasiswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">List Data</a></li>
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
                    <h5 class="card-title"><b>NPM :</b><br><?= $data_mahasiswa['npm']; ?></h5>
                    <p class="card-text"><b>Nama :</b><br><?= $data_mahasiswa['nama']; ?></p>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_mahasiswa['id_kelas']; ?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_mahasiswa['alamat']; ?></p>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_mahasiswa['jk']; ?></p>
                    <p class="card-text"><b>Tanggal Lahir :</b><br><?= $data_mahasiswa['tgl_lahir']; ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
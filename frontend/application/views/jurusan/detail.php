<div class="container pt-5">
    <h3>Data Jurusan</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>jurusan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jurusan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data jurusan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID :</b><br><?= $data_jurusan['id_jurusan']; ?></h5>
                    <p class="card-text"><b>Nama Jurusan:</b><br><?= $data_jurusan['nama']; ?></p>
                   
                    <p></p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
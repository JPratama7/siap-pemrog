<div class="container pt-5">
    <h3>List Data Kelas</h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('kelas/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID Kelas</th>
                                    <th>Id Wali</th>
                                    <th>Jurusan</th>
                                    <th>Tahun </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_kelas as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_kelas'] ?></td>
                                        <td><?= $row['id_wali'] ?></td>
                                        <td><?= $row['jurusan'] ?></td>
                                        <td><?= $row['tahunid'] ?></td>
                                       
                                        <td>
                                            <a href="<?= base_url('kelas/detail/' . $row['id_kelas']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('kelas/edit/' . $row['id_kelas']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('kelas/delete/' . $row['id_kelas']) ?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

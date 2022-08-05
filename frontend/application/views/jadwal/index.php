<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('jadwal/add'); ?>">Tambah Data</a>
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
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableJadwal">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID Jadwal </th>
                                    <th>ID Kelas</th>
                                    <th>ID Dosen</th>
                                    <th>Tanggal</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_jadwal as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_jadwal'] ?></td>
                                        <td><?= $row['id_kelas'] ?></td>
                                        <td><?= $row['id_dosen'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['mulai'] ?></td>
                                        <td><?= $row['selesai'] ?></td>
                                        <td>
                                            <a href="<?= base_url('jadwal/detail/' . $row['id_jadwal']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('jadwal/edit/' . $row['id_jadwal']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('jadwal/delete/' . $row['id_jadwal']) ?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableMahasiswa').DataTable();
</script>
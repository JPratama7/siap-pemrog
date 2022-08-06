
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Rest Client - PEMROGRAMAN III</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dosen'); ?>">Dosen</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('jurusan'); ?>">Jurusan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('kelas'); ?>">Kelas</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('MK'); ?>">Matkul</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('jadwal'); ?>">Jadwal</a>
            </li>
            <li class="nav-item active"style="float:right" >
                <a class="nav-link" href="<?= base_url('nilai'); ?>">Nilai</a>
            </li>
            
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('auth/generate') ?>">Generate</a>
         </li>

        </ul>



    </div>
    <div style="float:right;"><a href="<?php echo base_url('auth/logout') ?>"><button class="tombol_generate">Logout</button></a>

</nav>

<?= $this->extend('LayoutGuru/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="jumbotron mt-3 p-2">
        <h3 class="judul display-4"><?= $kelas['nama_kelas'] ?></h3>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div class="pengajar">
                <h4 class="text-center">Information</h4>
                <p><?= $kelas['deskripsi'] ?></p>
                <h5>Pengajar: <?= $kelas['nama'] ?></h5>
            </div>
            <a href="/Kelas/tambahTugas/<?= $kelas['id'] ?>"><button class="mt-2 btn btn-primary">Tambah</button></a><br>
            <a href="/Kelas/anggotaGuru/<?= $kelas['id'] ?>"><button class="mt-2 btn btn-primary">Anggota Kelas</button></a>
        </div>
        <div class="col-9">
            <div class="isi">
                <div class="row row-cols-1 row-cols-md-1 g-4">
                    <div class="col">
                        <?php foreach($tugas as $mat){ ?>
                        <div class="tugas card mt-2 shado">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="gambar" src="/images/task.jpg" alt="">
                                    </div>
                                    <a href="/Kelas/tugasGuru/<?= $kelas['id'] ?>/<?= $mat['id'] ?>" class="col-10">
                                        <h5 class="materi card-title"><?= $kelas['nama'] ?> memposting materi baru: <?= $mat['judul'] ?></h5>
                                    </a>
                                    <div class="col-1">
                                        <div class="dropdown">
                                            <svg data-bs-toggle="dropdown" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="/Kelas/editTugas/<?= $kelas['id'] ?>/<?= $mat['id'] ?>">Edit</a></li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('Layout/template') ?>
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
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Unenroll
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah anda yakin ingin keluar dari kelas <?= $kelas['nama_kelas'] ?>?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="/Home/keluar/<?= $kelas['id'] ?>"><button type="button" class="btn btn-primary">Iya</button></a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="isi">
                <div class="row row-cols-1 row-cols-md-1 g-4">
                    <div class="col">
                        <a href="/Kelas/anggota/<?= $kelas['id'] ?>"><button class="btn btn-primary">Anggota Kelas</button></a>
                        <?php foreach($tugas as $mat){ ?>
                        <div class="tugas card mt-2 shado">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="gambar" src="/images/task.jpg" alt="">
                                    </div>
                                    <a href="/Kelas/tugas/<?= $kelas['id'] ?>/<?= $mat['id'] ?>" class="col-11">
                                        <h5 class="materi card-title"><?= $kelas['nama'] ?> memposting materi baru: <?= $mat['judul'] ?></h5>
                                    </a>
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
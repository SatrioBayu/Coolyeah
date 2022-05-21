<?= $this->extend('LayoutGuru/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <a class="mt-4" href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
  <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
  <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
</svg></a>
    <h2><?= $tugas['judul'] ?></h2>
    <div class="cek">
        <p class="text-muted"><?= $kelas['nama'] ?></p>
        <p class="text-muted">Tenggat: <?= $tugas['batas_waktu'] ?></p>
        <hr>
        <h4><?= $tugas['deskripsi'] ?></h4>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($siswa as $jaw){ ?>
            <tr>
            <th><?= $jaw['nama'] ?></th>
            <th><?= $jaw['email_siswa'] ?></th>
            <td>Sudah Mengumpulkan</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
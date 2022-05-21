<?= $this->extend('Layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <a class="mt-4" href="javascript:history.back()">Kembali</a>
    <h3>Guru</h3>
    <h5 class="text-muted"><?= $guru['nama'] ?></h5>
    <h3 class="mt-3">Teman Sekelas</h3>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($siswa as $sis){ ?>
            <tr>
            <td><?= $sis['nama'] ?></td>
            <td><?= $sis['email_siswa'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</ddiv>

<?= $this->endSection() ?>
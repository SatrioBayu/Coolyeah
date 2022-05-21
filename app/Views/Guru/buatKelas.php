<?= $this->extend('LayoutGuru/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1 class="text-center">Buat Kelas</h1>
    <form method="POST" action="/Kelas/tambah">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" required placeholder="Nama Kelas" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Kelas</label>
            <input type="text" name="deskripsi" required placeholder="Deskripsi" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buat</button>
    </form>    
</div>
<?= $this->endSection() ?>
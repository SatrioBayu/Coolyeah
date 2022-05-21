<?= $this->extend('Layout/template') ?>
<?= $this->section('content') ?>

<div class="container pt-4">
    <?php if(!empty(session()->getFlashdata('exist'))){ ?>
        <div class="alert alert-danger text-center mt-3">
            <h5><?= session()->getFlashdata('exist') ?></h5>
        </div>
    <?php } ?>

        <div class="card-body">
            <h5 class="card-title">Cari Kelas </h5>  
            <form action="/Kelas/cari" method="post">
                <div class="row row g-0 align-items-center">
                    <div class="col-10"><input class="form-control" name="keyword" type="text" placeholder="Masukkan nama kelas"></div>
                    <div class="col-2"><button type="submit" class="btn btn-outline-primary">Search</button></div>
                </div>    
            </form>  
        </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Pengajar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kelas as $kel){ ?>
            <tr>
                <td><?= $kel['nama_kelas'] ?></td>
                <td><?= $kel['nama'] ?></td>
                <td><a href="/Join/<?= $kel['id'] ?>"><button class="btn btn-primary">Join</button></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
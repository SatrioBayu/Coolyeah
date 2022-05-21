<?= $this->extend('LayoutGuru/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <h3>Selamat datang <?= session()->get('emailGuru') ?></h3>
    <?php if(empty($kelas)){ ?>
        <h3 class="text-center">Kosong</h3>
    <?php } else{ ?>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        <?php foreach($kelas as $kel){ ?>
        <div class="col">
            <a href="/Kelas/detailKelasGuru/<?= $kel['id'] ?>">
                <div class="card h-100 shado">
                    <div class="card-header bluebg h-100">
                        <h5 class="card-title text-white"><?= $kel['nama_kelas'] ?></h5>
                        <div class="text-right">
                        </div>
                    </div>
                    <div class="card-body text-blue">
                        <p class="card-text"><?= $kel['nama'] ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?= $this->endSection() ?>
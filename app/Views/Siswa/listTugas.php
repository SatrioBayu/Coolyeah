<?= $this->extend('Layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <h3 class="display-4">List Tugas</h3>
    <?php if(empty($tugas)){ ?>
        <h3 class="text-center">Kosong</h3>
    <?php }else{ ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Kelas</th>
            <th scope="col">Tugas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tugas as $tug){ ?>
                <?php for($i=0; $i<count($tug);$i++){ ?>
            <tr>
            <td><a href="/Kelas/detail/<?= $tug[$i]['id_kelas'] ?>"><?= $tug[$i]['nama_kelas'] ?></a></td>
            <td><a href="/Kelas/tugas/<?= $tug[$i]['id_kelas'] ?>/<?= $tug[$i]['id'] ?>"><?= $tug[$i]['judul'] ?></a></td>
            </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
<?= $this->endSection() ?>
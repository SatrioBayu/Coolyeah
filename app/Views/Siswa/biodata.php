<?= $this->extend('Layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <h3 class="display-4">Biodata</h3>
    <?php if(!empty(session()->getFlashdata('update'))){ ?>
        <div class="alert alert-success text-center mt-3">
            <h5><?= session()->getFlashdata('update') ?></h5>
        </div>
    <?php } ?>
    <form id="no" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input id="email" type="email" class="form-control" disabled value="<?= $siswa['email_siswa'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input id="nama" type="text" class="form-control" disabled value="<?= $siswa['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="pass" type="password" class="form-control" disabled  value="<?= $siswa['password'] ?>">
        </div>
        <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
    </form>
    <form hidden id="go" method="POST" action="/Siswa/edit">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input id="email" type="email" class="form-control" name="email" required value="<?= $siswa['email_siswa'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input id="nama" type="text" class="form-control" name="nama" required value="<?= $siswa['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="pass" type="password" class="form-control" name="password" required value="<?= $siswa['password'] ?>">
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Save
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <h3>Apakah anda yakin?</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Iya</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>

    function edit(){
        document.getElementById("no").hidden = true;
        document.getElementById("go").hidden = false;
    }

</script>
<?= $this->endSection() ?>
<?= $this->extend('LayoutGuru/template') ?>
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
            <input id="email" type="email" class="form-control" disabled value="<?= $guru['email_guru'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input id="nama" type="text" class="form-control" disabled value="<?= $guru['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="pass" type="password" class="form-control" disabled  value="<?= $guru['password'] ?>">
        </div>
        <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
    </form>
    <form hidden id="go" method="POST" action="/Guru/edit">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input id="email" type="email" class="form-control" name="email" required value="<?= $guru['email_guru'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input id="nama" type="text" class="form-control" name="nama" required value="<?= $guru['nama'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="pass" type="password" class="form-control" name="password" required value="<?= $guru['password'] ?>">
        </div>
        <button id="confirm" type="submit" class="save btn btn-primary">Submit</button>
    </form>
</div>
<script>

    function edit(){
        document.getElementById("no").hidden = true;
        document.getElementById("go").hidden = false;
    }

</script>
<?= $this->endSection() ?>
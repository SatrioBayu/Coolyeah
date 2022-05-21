<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/login.css">
    <script src="/js/login.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="container form-box">
            <div class="container btn-box">
                <div id="btn"></div>
                <button type="button" class="btn-switch log" onclick="login()">Login</button>
                <button type="button" class="btn-switch reg" onclick="register()">Register</button>
            </div>
            <?php if(!empty(session()->getFlashdata('login'))){ ?>
                <div class="text-center alert-danger">
                    <h4><?= session()->getFlashdata('login') ?></h4>
                </div>
            <?php } ?>
            <?php if(!empty(session()->getFlashdata('gagal'))){ ?>
                <div class="text-center alert-danger">
                    <h4><?= session()->getFlashdata('gagal') ?></h4>
                </div>
            <?php } ?>
            <?php if(!empty(session()->getFlashdata('gagalRegis'))){ ?>
                <div class="text-center alert-danger">
                    <h4><?= session()->getFlashdata('gagalRegis') ?></h4>
                </div>
            <?php } ?>
            <form action="Siswa/verifikasi" id="login" class="input-group" method="POST">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <div class="btn-place">
                    <button type="submit" class="submit-btn login-btn">Login</button>
                </div>
            </form>
            <form action="Siswa/addUser" id="register" class="input-group">
                <input type="email" name="email" id="" class="input-field" placeholder="Email" required>
                <input type="text" name="nama" id="" class="input-field" placeholder="Nama" required>
                <input type="password" name="password" id="" class="input-field" placeholder="Password" required>
                <div class="btn-place">
                    <button id="reg" type="submit" class="submit-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
    <div class="credit">
        <p>COOLYEAH, 2021</p>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>

</html>
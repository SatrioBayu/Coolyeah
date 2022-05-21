<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Kelas">Join Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Tugas">Tugas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Akun
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/Siswa/biodata">Informasi Akun</a></li>
            <li><a class="dropdown-item" href="/Logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> -->

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
              <a href="/Home" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">COOLYEAH</span> </a>
              <div class="nav_list"> 
                <a href="/Home" class="nav_link <?php if($judul=="Dashboard"){?> active <?php } ?>"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                <a href="/Siswa/biodata" class="nav_link <?php if($judul=="Biodata"){?> active <?php } ?>"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                <a href="/Kelas" class="nav_link <?php if($judul=="Daftar Kelas"){?> active <?php } ?>"> <i class='bx bx-add-to-queue'></i> <span class="nav_name">Tambah Kelas</span> </a>
                <a href="/Tugas" class="nav_link <?php if($judul=="List Tugas"){?> active <?php } ?>"> <i class='bx bx-task' ></i> <span class="nav_name">List Tugas</span> </a>
              </div>
            </div> <a href="/Logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
</body>
  <!--Container Main start-->
  <!-- <div class="height-100 bg-light">
      <h4>Main Components</h4>
  </div> -->
  <!--Container Main end-->
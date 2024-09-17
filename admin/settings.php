<?php
//session
session_start();

if(!isset($_SESSION["admin"])){
header("location: login.php");
}

//koneksi
include "../koneksi.php";

//sql query
$sql_settings = "SELECT * FROM `fikclass_settings` WHERE `name` = 'form_pendaftaran'";
$sql_medpart = "SELECT * FROM `fikclass_ext` WHERE `jenis` = 'medpart'";
$sql_sponsor = "SELECT * FROM `fikclass_ext` WHERE `jenis` = 'sponsor'";
$sql_ig = "SELECT * FROM `fikclass_ext` WHERE `jenis` = 'ig'";

//data settings
$setting = mysqli_query($conn, $sql_settings);
while ($row = mysqli_fetch_array($setting)) {
$isset = $row['isset'];
}

//medpart & sponsor
if(isset($_POST['medpart']) || isset($_POST['sponsor'])){
$jenis = $_POST['jenis'];

$gambar_name = htmlspecialchars($_FILES['nama']['name']);
$explode = explode('.',$gambar_name);
$gambar_name_front = $explode[0];
$gambar_type = strtolower(end($explode));
$gambar_size = htmlspecialchars($_FILES['nama']['size']);
$gambar_tmp = htmlspecialchars($_FILES['nama']['tmp_name']);
$gambar_name_result = $gambar_name_front .'_'. rand() .'.'. $gambar_type;

$type_gambar = ['jpg','jpeg','png'];
  if (in_array($gambar_type, $type_gambar)){
    if ($gambar_size < 5000000){ 
      move_uploaded_file($gambar_tmp, '../data_ext/' . $gambar_name_result); 
    }
    else{
      echo"<script>
      alert('Item harus berukuran dibawah 5MB'); location.href='settings.php';</script>";
      exit;
    }
  }
  else{
    echo"<script>alert('Item hanya berformat png, jpg, dan jpeg');
          location.href = 'settings.php';</script>";
    exit;
  }

  $query = "INSERT INTO `fikclass_ext`(`nama`, `jenis`) VALUES ('$gambar_name_result', '$jenis')";
  $result = mysqli_query($conn,$query);

  if (mysqli_affected_rows($conn) > 0) {
    echo"<script>alert('Input Item berhasil !');location.href = 'settings.php';</script>";
    exit;
  }
  else{
    echo"<script>alert('Input Item gagal !');location.href = 'settings.php';</script>";
    exit;
  }
}

//instagram embed
if(isset($_POST['ig'])){
  $jenis = $_POST['jenis'];
  $nama = $_POST['nama'];

  $query = "INSERT INTO `fikclass_ext`(`nama`, `jenis`) VALUES ('$nama', '$jenis')";
  $result = mysqli_query($conn,$query);

  if (mysqli_affected_rows($conn) > 0) {
    echo"<script>alert('Input Instagram embed berhasil !');location.href = 'settings.php';</script>";
    exit;
  }
  else{
    echo"<script>alert('Input Instagram embed gagal !');location.href = 'settings.php';</script>";
    exit;
  }
}

//hapus ig medpart sponsor
if(isset($_POST["hapus_medpart"]) || isset($_POST["hapus_sponsor"]) || isset($_POST["hapus_ig"])){
  $id = $_POST['id'];
  $query = "DELETE FROM `fikclass_ext` WHERE `id` = $id";
  $result = mysqli_query($conn,$query);

  if (mysqli_affected_rows($conn) > 0) {
    echo"<script>alert('Item berhasil dihapus !');location.href = 'settings.php';</script>";
  }else{
    echo"<script>alert('Item gagal dihapus !');</script>";
  }
}


//setting change
  if (isset($_POST["settings"])){
  $isset = $_POST["isset"];
  $query = mysqli_query($conn, "UPDATE fikclass_settings SET isset = $isset WHERE `name` = 'form_pendaftaran'");
  if(isset($query)){
    echo '<script language="javascript">';
    echo 'alert("Pengaturan Web Telah Terubah!")';
    echo '</script>';};
  };

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin FIKCLASS 2022</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <style>
      /* table.dataTable thead .sorting, 
      table.dataTable thead .sorting_asc, 
      table.dataTable thead .sorting_desc {
          background : none;
      } */
    </style>
  </head>

  <body class="app sidebar">

    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">FIKCLASS 2022</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user bg-warning">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
          <p class="app-sidebar__user-designation">FIKCLASS 2022</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Data Keseluruhan</span></a></li>
        <li><a class="app-menu__item" href="valid.php"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Data Valid</span></a></li>
        <li><a class="app-menu__item active" href="settings.php"><i class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Pengaturan Website</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-gear"></i> Settings</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Settings</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <h5>Pengaturan Website</h5>
                <label>
                <input type='hidden' value='0' name='isset'>
                <?php if($isset == 1){
                    echo "<input type='checkbox' value='1' name='isset' checked>";
                }else{
                    echo "<input type='checkbox' value='1' name='isset'>";
                }?> Tutup Form Registrasi</label><br>

                <button type="submit" class="btn btn-primary" name="settings">Submit</button>
            </form><br><br>



          <div class="tile">
            <div class="tile-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <h5>Tambah Sponsors</h5>
                    <input type="text" value="sponsor" name="jenis" hidden>
                    <input type="file" name="nama" class="form-control" style="display: inline; width: 40%; height: 45px;">
                    <button type="submit" class="btn btn-lg btn-primary" name="sponsor">Tambah</button>
                </form><br>

              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead class="bg-light">
                    <tr>
                      <th width="100px">No</th>
                      <th width="400px">Item</th>
                      <th width="100px">Hapus Sponsors</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($conn,$sql_sponsor);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td class="text-center"><a href="../data_ext/<?=$row['nama']?>" target="_blank"><img
                            src="../data_ext/<?=$row['nama']?>" alt="..."
                            style="width: 150px; height: 150px; object-fit: contain;"><br><?=$row['nama']?></a></td>
                      <td>
                        <form action="" method="post">
                        <input type="text" value="<?=$row['id']?>" name="id" hidden>
                        <button type="submit" name="hapus_sponsor" class="btn btn-danger"
                          onclick="return confirm('Apakah anda yakin ingin menghapus ini?\n\nData tidak bisa dikembalikan ketika sudah dihapus.');">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                    $no++;
                    };
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <div class="tile">
            <div class="tile-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <h5>Tambah Medpart</h5>
                    <input type="text" value="medpart" name="jenis" hidden>
                    <input type="file" name="nama" class="form-control" style="display: inline; width: 40%; height: 45px;">
                    <button type="submit" class="btn btn-lg btn-primary" name="medpart">Tambah</button>
                </form><br>

              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead class="bg-light">
                    <tr>
                      <th width="100px">No</th>
                      <th width="400px">Item</th>
                      <th width="100px">Hapus Medpart</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($conn,$sql_medpart);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td class="text-center"><a href="../data_ext/<?=$row['nama']?>" target="_blank"><img
                            src="../data_ext/<?=$row['nama']?>" alt="..."
                            style="width: 150px; height: 150px; object-fit: contain;"><br><?=$row['nama']?></a></td>
                      <td>
                        <form action="" method="post">
                        <input type="text" value="<?=$row['id']?>" name="id" hidden>
                        <button type="submit" name="hapus_medpart" class="btn btn-danger"
                          onclick="return confirm('Apakah anda yakin ingin menghapus ini?\n\nData tidak bisa dikembalikan ketika sudah dihapus.');">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                    $no++;
                    };
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <div class="tile">
            <div class="tile-body">

                <form action="" method="post">
                    <h5>Tambah Instagram Embed</h5>
                    <input type="text" value="ig" name="jenis" hidden>
                    <textarea name="nama" cols="60" rows="10"></textarea><br>
                    <button type="submit" class="btn btn-lg btn-primary" name="ig">Tambah</button>
                </form><br>

              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead class="bg-light">
                    <tr>
                      <th width="100px">No</th>
                      <th width="400px">Item</th>
                      <th width="100px">Hapus Instagram Embed</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($conn,$sql_ig);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$row['nama']?></td>  
                      <td>
                        <form action="" method="post">
                        <input type="text" value="<?=$row['id']?>" name="id" hidden>
                        <button type="submit" name="hapus_medpart" class="btn btn-danger"
                          onclick="return confirm('Apakah anda yakin ingin menghapus ini?\n\nData tidak bisa dikembalikan ketika sudah dihapus.');">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                    $no++;
                    };
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          
        </div>
      </div>
    </main>


    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>

  </body>
</html>
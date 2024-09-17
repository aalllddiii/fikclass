<?php
//un : minfikclass
//pw : ademin

session_start();

if(!isset($_SESSION["admin"])){
  header("location: login.php");
}

include_once "../koneksi.php";

$sql = "SELECT * FROM  `fikclass_users` WHERE `validation`='VALID'";

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
        <li><a class="app-menu__item  active" href="valid.php"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Data Valid</span></a></li>
        <li><a class="app-menu__item" href="settings.php"><i class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Pengaturan Website</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-check"></i> Data Valid</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Data Valid</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="bg-light">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NPM</th>
                      <th>Kelas</th>
                      <th>Fakultas</th>
                      <th>Jurusan</th>
                      <th>Domisili</th>
                      <th>ID Line</th>
                      <th>E-mail</th>
                      <th>No WhatsApp</th>
                      <th>Gambar</th>
                      <th>Validasi</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['nama']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['npm']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['kelas']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['fakultas']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['jurusan']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['domisili']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['idline']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['email']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['nohp']));?></td>

                      <td class="text-center">
                          <a href="../data_img/<?=$row['bukti_tf']?>" target="_blank"><img
                      src="../data_img/<?=$row['bukti_tf']?>" alt="..."
                      style="width: 50px; height: 60px; object-fit: contain;"><br><?=$row['bukti_tf']?></a>
                      </td>

                      <td>
                          <a href="cancelvalidation.php?id=<?=$row['id']?>" onclick="return confirm('Apakah anda yakin ingin membatalkan validasi data ini?');">Batalkan Validasi</a>
                      </td>

                      <td>
                        <a href="ubah.php?id=<?=$row['id']?>"><i class="fas fa-pen"></i></a> |
                        <a href="hapus.php?id=<?=$row['id']?>"
                          onclick="return confirm('Apakah anda yakin ingin menghapus ini?\n\nData tidak bisa dikembalikan ketika sudah dihapus.');"><i
                            class="fas fa-trash-alt"></i></a>
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
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({

      dom: 'Bfrtip',
      buttons: [
        {
           extend: 'print',
           exportOptions: {
           columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] //Your Column value those you want
          }
        },
        {
            extend: 'excel',
            exportOptions: {
            columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] //Your Column value those you want
            }
        },
        {
            extend: 'csv',
            exportOptions: {
            columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] //Your Column value those you want
            }
        },
        {
            extend: 'copy',
            exportOptions: {
            columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] //Your Column value those you want
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
            columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] //Your Column value those you want
            }
        },
      ]
    });</script>

  </body>
</html>
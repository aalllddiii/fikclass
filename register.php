<?php
include_once "koneksi.php";

$query = "SELECT * FROM  `fikclass_settings` WHERE `name` = 'form_pendaftaran'";

$setting = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($setting)) {
    $isset = $row['isset'];
}

if(isset($_POST['submit'])){
    $nama = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nama']));
    $npm = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['npm']));
    $kelas = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['kelas']));
    $fakultas = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['fakultas']));
    $jurusan = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['jurusan']));
    $domisili = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['domisili']));
    $idline = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['idline']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']));
    $nohp = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nohp']));

    $gambar_name = htmlspecialchars($_FILES['bukti_tf']['name']);
    $explode = explode('.',$gambar_name);
    $gambar_type = end($explode);
    $gambar_size = htmlspecialchars($_FILES['bukti_tf']['size']);
    $gambar_tmp = htmlspecialchars($_FILES['bukti_tf']['tmp_name']);
    $gambar_name_result = 'buktitf_'. $nama .'_'. $npm .'_'. rand() .'.'. $gambar_type;
    
    $type_gambar = ['jpg','jpeg','png'];
    if (in_array($gambar_type, $type_gambar)){
        if ($gambar_size < 1000000){
            move_uploaded_file($gambar_tmp, 'data_img/'. $gambar_name_result);
        }else{
            echo"<script>alert('Bukti Transfer harus berukuran dibawah 1MB');</script>";
            exit;
        }
    }else{
        echo"<script>alert('Bukti Transfer hanya berformat png, jpg, dan jpeg');</script>";
        exit;
    }

    $sql = "INSERT INTO `fikclass_users`(`nama`, `npm`, `kelas`, `fakultas`, `jurusan`, `domisili`, `idline`, `email`, `nohp`, `bukti_tf`) VALUES 
            ('$nama','$npm','$kelas','$fakultas','$jurusan','$domisili','$idline','$email','$nohp','$gambar_name_result')";

    $result = mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo"<script>alert('Pendaftaran berhasil !'); location.href='link.php';</script>";
        exit;
    }else{
        echo"<script>alert('Pendaftaran gagal !');</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FIKCLASS 2022</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

		<style>
            .wall-1 {
                padding: 20px 0;
                background: linear-gradient(to bottom right, rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.5)), url("./assets/img/bg-fix.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: bottom;
                background-size: cover;
            }
            
            .close-btn{
                text-align: right;
            }

            .close-btn:hover{
                color: rgb(255, 211, 18);
            }

            .registration-form {
                padding: 50px 0;
            }

            .registration-form form {
                background-color: #fff;
                max-width: 800px;
                margin: auto;
                padding: 10px 20px;
                border-radius: 10px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            }

            form .form-group{
                padding: 0 60px;
            }

            .registration-form .item {
                border-radius: 5px;
                margin-bottom: 15px;
                padding: 10px 20px;
            }

            @media (max-width: 600px) {

                .registration-form form {
                    padding: 20px 0;
                }

            }
		</style>
    </head>
    <body class="wall-1" style="height:100vh;">

    <div class="container-fluid">

            <div class="registration-form">
                
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 style="text-align: right; margin-right:4%; ; margin-top: 5px;">
                        <a href="./index.php" style="text-decoration: none;" class="text-dark"><span class="close-btn">&times;</span></a>
                    </h3>
                    <div class="text-center form-group">
                        <h4>Form Pendaftaran<span class="text-primary"> FIKLASS</span> 2022</h4>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="nama" required placeholder="Nama Lengkap" name="nama">
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-5 col-12">
                            <input type="text" class="form-control item" id="npm" required placeholder="NPM" name="npm" pattern="[0-9]{8}" title="8 angka NPM anda">
                        </div>
                        <div class="col-lg-5 col-12">
                            <input type="text" class="form-control item" id="kelas" required placeholder="Kelas" name="kelas" pattern="[0-9a-zA-Z]{5}" title="Harus terdiri dari 5 karakter">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control item" id="fakultas" required placeholder="Fakultas" name="fakultas">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="jurusan" required placeholder="Jurusan" name="jurusan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="domisili" required placeholder="Region" name="domisili">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control item" id="email" required placeholder="E-mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="idline" placeholder="ID Line" name="idline">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="nohp" required placeholder="Nomor WhatsApp" name="nohp" pattern="[0-9]{11,}" title="Tidak diperkenankan menggunakan karakter spesial dan minimal terdiri dari 11 angka">
                    </div>
                    <br>
                    <div class="form-group">
                        <h6>Bukti Transfer</h6>
                        <p class="m-0 p-0 text-muted">BCA 4730 576 124 (Muhammad Fauzan)</p>
                        <p class="m-0 p-0 text-muted">DANA 081380478680 (Muhammad Fauzan)</p>
                        <p class="m-0 p-0 text-dark mb-2"><b>Contoh deskripsi tf :</b> “Pendaftaran FIKCLASS A.N NURUL”</p>
                        <input type="file" class="form-control item text-muted" required name="bukti_tf">
                        <p class="m-0 p-0 text-dark">Maks File 1 mb (png/jpg/jpeg)</p>
                    </div><br>
                    <!-- <button type='submit' name='submit' class='btn btn-primary btn-lg text-dark my-2'><h5 class='m-0' onclick='return confirm("Apakah data yang diisikan sudah benar?\nKlik Ok untuk melanjutkan...")'>Daftar</h5>
                            </button> -->
                    <div class="form-group text-center pb-2">
                        <?php 
                        if($isset == 0){
                            $kutip = htmlspecialchars('"');
                            $n = htmlspecialchars('\n');
                            $confirmtext = "$kutip Apakah data yang diisikan sudah benar?$n Klik Ok untuk melanjutkan...$kutip";
                            
                            echo "<button type='submit' name='submit' class='btn btn-primary btn-lg text-dark my-2'><h5 class='m-0' onclick='return confirm($confirmtext)'>Daftar</h5>
                            </button>";
                        }else{
                            echo "<h5 class='text-danger'>Maaf, pendaftaran telah ditutup</h5>";
                        }
                        ?>
                        
                    </div>
                </form>
            </div>

    </div>

        

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>

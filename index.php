<?php
include_once "./koneksi.php";
$sql_medpart = "SELECT * FROM  `fikclass_ext` WHERE `jenis` = 'medpart'";
$sql_sponsor = "SELECT * FROM  `fikclass_ext` WHERE `jenis` = 'sponsor'";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FIKCLASS 2022</title>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="./assets/owlAssets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/owlAssets/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- javascript -->
    <script src="./assets/owlAssets/vendors/jquery.min.js"></script>
    <script src="./assets/owlAssets/owlcarousel/owl.carousel.js"></script>
                
                

    <style>
        .wall-1 {
            padding: 10px 0;
            background: linear-gradient(to bottom right, rgb(0, 0, 0, 0.9), rgb(0, 0, 0, 0.4)), url("./assets/img/bg-fix.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top;
            background-size: cover;
        }
        .wall-2{
            border-radius: 80px 80px 0 0; 
            box-shadow: -1px -2px 7px grey; 
            background: linear-gradient(to bottom, rgb(255, 211, 18, 0.8),rgb(255, 211, 18, 0.8)), url("./assets/img/logo.png");
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover;
        }
        .sponsors-logo{
            max-width: 300px;
        }
        .support-logo{
            max-width: 600px;
        }
        .medpart-logo{
            max-width: 100px;
        }

        @media only screen and (max-width: 600px) {
            .sponsors-logo{
                max-width: 200px;
            }
            .support-logo{
                max-width: 300px;
            }
            .medpart-logo{
                max-width: 70px;
            }
            .snk{
                width: 90%;
            }
            
        }

    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav" style="min-height: 10vh;">
        <div class="container">

            <a class="navbar-brand my-0 py-0" href="#page-top"><img src="assets/img/logo.png"
                    alt="Fikclass-logo" style="width: 50px; height: 50px; transform:translateY(-3px);"> Fikclass</a>
            <button style="font-size: 14px;" class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline">timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#register">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#speakers">Speakers</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="height: 640px;">
        <div class="container">
            <div class="masthead-heading" style="font-size: 3rem; margin-bottom: 10px;">Welcome to <span
                    style="color: #ffc800;">FIKCLASS</span> 2022 !</div>
            <div class="masthead-subheading" style="font-size: 1.4rem;">"Improve Design Skills to Start your Experience
                in Globalization Era"</div>
            <!-- <div class="masthead-heading">
                <img src="assets/img/headline.png" alt="" style="width: 75%; height: 200px; transform:translateY(-30%);"> -->
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
        
    </header>

    <!-- about-->
    <section class="page-section" style="padding-top: 0;">
        <div class="container">
            <div id="about" class="text-center bg-dark"
                style="box-shadow: 1px 2px 3px grey; position:relative; top:-45px; height: 90px; border-radius: 60%; padding: 30px;">
                <h3 class="section-heading text-uppercase text-white">FIKTI CULTURE CLASS 2022</h3>
            </div>
            <div class="row text-center">
                <div class="col-lg-4">
                    <img src="assets/img/logo.png" alt="Fikclass-logo" style="width: 350px; height: 350px;"
                        class="mt-5">
                </div>
                <div class="col-lg-8">
                    <h4 class="mt-5 mb-4">FIKCLASS 2022</h4>
                    <p class="text-muted">
                        <b>FIKCLASS 2022 (FIKTI CULTURE CLASS) </b>FIKCLASS 2022 (FIKTI CULTURE CLASS) merupakan salah
                        satu program kerja BEM FIKTI berupa event workshop (Badan Eksekutif Mahasiswa Fakultas Ilmu
                        Komputer dan Teknologi Informasi) Universitas Gunadarma yang dijalankan oleh Departemen Seni
                        Budaya yang berbentuk workshop dan bertemakan “Improve Design Skills to Start your Experience in
                        Globalization Era” dengan harapan dapat memberikan pembelajaran kepada Mahasiswa/i Universitas
                        Gunadarma yang tertarik dalam bidang desain grafis.
                    </p>
                    <p class="text-muted">
                        Workshop FIKCLASS 2022 ini diselenggarakan sebanyak tiga pertemuan dan akan berkolaborasi dengan
                        partner yang bergerak di bidang desain dan pemasaran serta berupa official store merchandise
                        dari BEM FIKTI Universitas Gunadarma yaitu FIKTI Art Merchandise (FAM). Penasaran dengan
                        keseruannya? Yuk, daftarkan dirimu sekarang juga!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 px-5">
                    <h4 class="mt-5 mb-4">Tujuan Kegiatan</h4>
                    <div class="row text-muted">
                        <div class="col-1"><b>1.</b></div>
                        <div class="col-11">
                            Mengembangkan dan mengasah kemampuan yang dimiliki oleh peserta mengenai langkah-langkah
                            dalam pembuatan desain merchandise menggunakan tools Adobe Illustrator
                        </div>
                        <div class="col-1"><b>2.</b></div>
                        <div class="col-11">
                            Menumbuhkan motivasi dan inovasi Mahasiswa/I Universitas Gunadarma mengenai kebudayaan dalam
                            Digital Art
                        </div>
                        <div class="col-1"><b>3.</b></div>
                        <div class="col-11">
                            Menyalurkan minat bakat peserta dalam mengembangkan bakatnya dalam bidang desain grafis
                            menggunakan Adobe Ilustrator
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 px-5">
                    <h4 class="mt-5 mb-4">Manfaat Kegiatan</h4>
                    <div class="row text-muted">
                        <div class="col-1"><b>1.</b></div>
                        <div class="col-11">
                            Menambah skill dan wawasan peserta workshop
                        </div>
                        <div class="col-1"><b>2.</b></div>
                        <div class="col-11">
                            Menambah dan memperluas relasi
                        </div>
                        <div class="col-1"><b>3.</b></div>
                        <div class="col-11">
                            Dapat membuka peluang usaha baru bagi peserta workshop
                        </div>
                    </div>
                    <div class="mt-5 mb-4" style="border: 2px solid brown; border-radius: 15px; padding: 20px;">
                        <h4>Syarat dan Ketentuan Peserta</h4>
                        <div class="row text-muted">
                            <div class="col-1"><b>1.</b></div>
                            <div class="col-11 snk">
                                Mahasiswa/i Aktif Universitas Gunadarma
                            </div>
                            <div class="col-1"><b>2.</b></div>
                            <div class="col-11 snk">
                                Memiliki aplikasi Adobe Illustrator
                            </div>
                            <div class="col-1"><b>3.</b></div>
                            <div class="col-11 snk">
                                Peserta mengikuti seluruh kegiatan workshop FIKCLASS 2022
                            </div>
                            <div class="col-1"><b>4.</b></div>
                            <div class="col-11 snk">
                                Peserta dapat mengikuti workshop FIKCLASS 2022 dengan membayar biaya pendaftaran
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="page-section py-0" id="timeline">
        <div class="container-fluid" style="padding: 0;">
            <div class="text-center text-uppercase text-dark">
                <div
                style="width: 75%; margin: 0 auto; border-radius: 100px 100px 0 0; height: 50px; background-color:rgb(255, 211, 18);">
                <h2 style="margin: 0; padding-top: 20px;">Timeline</h2><hr width="50%" class="mx-auto">
                </div>
            </div>
            <div style="padding-top:60px; background: linear-gradient(to bottom, rgb(255, 211, 18),rgb(194, 94, 0));">
                <ul class="timeline mb-0">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/tm-4.jpg" alt="..." style="width: 100%;height: 100%;object-fit: cover;" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-white">
                                <h6>Day 1</h6>
                                <h4 class="subheading">What Tools are Used to Create Merchandise Designs?</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-dark"><b>
                                        Sabtu, 2 April 2022 <br>
                                        08.30 – 11.35 WIB <br>
                                        Zoom Cloud Meetings <br></b>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/tm-3.jpg" alt="..." style="width: 100%;height: 100%;object-fit: cover;" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-white">
                                <h6>Day 2</h6>
                                <h4 class="subheading">Step by Step to Make a Merchandise Design</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-dark"><b>
                                        Minggu, 3 April 2022 <br>
                                        13.00 – 16.00 WIB <br>
                                        Zoom Cloud Meetings <br></b>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/tm-2.jpg" alt="..." style="width: 100%;height: 100%;object-fit: cover;" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-white">
                                <h6>Day 3</h6>
                                <h4 class="subheading">Announcements and Rewards</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-dark"><b>
                                        Sabtu, 9 April 2022 <br>
                                        09.00 – 12.00 WIB <br>
                                        Zoom Cloud Meetings <br></b>
                                </p>
                            </div>
                            <br><br>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </section>

    <section class="page-section wall-1"><br><br>
        <div class="container text-white">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Benefits</h2>
                <hr style="margin: 0 auto 10px; width: 60%;">
                <br>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-lg-4 text-center mb-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x" style="color: rgb(165, 74, 0);"></i>
                        <i class="fas fa-user-friends fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Relasi Baru</h4>
                </div>
                <div class="col-6 col-lg-4 text-center mb-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-tshirt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Hadiah Untuk 2 Karya Terbaik</h4>
                </div>
                <div class="col-6 col-lg-4 text-center mb-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x" style="color: rgb(165, 74, 0);"></i>
                        <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">E-Certificate</h4>
                </div>
                <div class="col-6 col-lg-4 text-center mb-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-book-open fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Knowledge</h4>
                </div>
                <div class="col-6 col-lg-4 text-center mb-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x" style="color: rgb(165, 74, 0);"></i>
                        <i class="fas fa-gifts fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Doorprize</h4>
                </div>
            </div>
        </div><br>
    </section>

    <section class="page-section text-white py-5" id="register" style="background-color: rgb(25, 25, 25);">
        <div class="text-center">
            <h2 class="section-heading">Tunggu apalagi? <span class="text-primary">Yuk daftar</span>!</h2>
            <hr style="margin: 0 auto 20px; width: 50%;"><br>
        </div>
        <div class="container text-center">
            <h4 class="text-white">Periode Pendaftaran : <b>15 - 22 Maret 2022</b></h4>
            <h4 class="text-white">Biaya Pendaftaran : <b>10k</b></h4><br>
            <h6 class="text-white">CP (<span class="text-primary">WhatsApp</span>) : Putri (<span class="text-primary">+62 895-3384-31299</span>)</h6>
            <h6 class="text-white">CP (<span class="text-primary">Line</span>) : (<span class="text-primary">wandanie</span>)</h6><br><br>
            <a href="./register.php">
                <button class="btn btn-large btn-primary text-dark"
                    style="width: 200px; height: 50px;"><b>Register Now!</b>
                </button>
            </a>
            
        </div>
    </section><br><br>


    <!-- Speakers-->
    <section class="page-section bg-white py-4" id="speakers">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Speakers</h2><br>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/elsa.jpeg" alt="..." style="object-fit: cover;"/>
                        <h4>Elsa Mutiara Nuralifia</h4>
                        <p class="text-muted">Graphic Design Enthusiast</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/erika.jpeg" alt="..." style="object-fit: cover;"/>
                        <h4>Erika Ananda Putri, S.Ds.</h4>
                        <p class="text-muted">Graphic Designer at Dedoco</p>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>

    <section class="page-section py-4">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Master Of Ceremony</h2><br>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/naura.jpg" alt="..." style="object-fit: cover;" />
                        <h4>Naura Nabila Qanita</h4>
                        <p class="text-muted">Sistem Informasi 2020</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/fadri.png" alt="..." style="object-fit: cover;" />
                        <h4>Fadri Oktavian</h4>
                        <p class="text-muted">Sistem Komputer 2020</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/queen.png" alt="..." style="object-fit: cover; object-position: 100% -100%;" />
                        <h4>Queensly Britney</h4>
                        <p class="text-muted">Sistem Informasi 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>

    <section class="page-section py-4">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">FIND US ON INSTAGRAM</h2><br>
            </div>
            <div class="row justify-content-center">
                <?php include_once "ig.php";?>
            </div>
            </div>
    </section><br><br>

    <section class="page-section py-4 wall-2">
        <div class="container text-center">
            <div class="text-center">
                <h2 class="section-heading">Sponsors</h2><br>
            </div>
            <div class="row justify-content-center">
                <?php
                $result_sponsor = mysqli_query($conn,$sql_sponsor);
                while($row = mysqli_fetch_assoc($result_sponsor)){
                    $nama = $row["nama"];
                    echo"<div class='col-12 col-lg-6'><div><img class='sponsors-logo' src='./data_ext/$nama' alt='...'/></div></div>";
                };?>
            </div>
            <br><br><br><br>
            <div class="text-center">
                <h2 class="section-heading">Supported By</h2><br>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div>
                        <img class="support-logo mb-5" src="assets/img/contoh/famhitam.png" alt="..."/>
                        <h3 class="mt-3">FIKTI Art Merchandise</h3><br><br>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="text-center">
                <h2 class="section-heading">Media Partner</h2><br>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $result_medpart = mysqli_query($conn,$sql_medpart);
                        while($row = mysqli_fetch_assoc($result_medpart)){
                            $nama = $row["nama"];
                            echo"<img class='rounded-circle mx-auto medpart-logo' src='./data_ext/$nama' alt='...' />";
                        };?>
                    </div>
                </div>
            </div><br><br><br>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="text-lg text-center">Maintaned by <b><a href="https://www.instagram.com/p/CVXvVKOhhlJ/?utm_source=ig_web_copy_link" style="text-decoration: none; color: white;" target="__blank">Biro PTI 2021/2022</a></b></div>
                <!-- <div class="pt-3">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
            </div>
        </div>
    </footer>



    <script>
      $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
          dots: false,
          items: 6,
          loop: true,
          margin: 5,
          autoplay: true,
          autoplayTimeout: 4000,
          autoplayHoverPause: false,
          smartSpeed: 2000,
        });
      })
    </script>
    <!-- vendors -->
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

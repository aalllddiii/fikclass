<?php
include_once "./koneksi.php";
$sql_ig = "SELECT * FROM  `fikclass_ext` WHERE `jenis` = 'ig'";

$result_ig = mysqli_query($conn,$sql_ig);
while($row = mysqli_fetch_assoc($result_ig)){
    $nama = $row["nama"];
    echo'<div class="col-12 col-md-4 col-lg-4 mx-auto mb-4">'. $nama .'</div>';    
};
?>

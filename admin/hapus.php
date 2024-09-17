<?php
include_once "../koneksi.php";

$id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['id']));

$sql = "DELETE FROM `fikclass_users` WHERE `id` = $id";

$result = mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn) > 0) {
echo"<script>alert('Data berhasil dihapus !'); location.href='index.php';</script>";
}else{
echo"<script>alert('Data gagal dihapus !');</script>";
}

?>
<?php
include_once "../koneksi.php";

$id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['id']));

$sql = "UPDATE `fikclass_users` SET `validation`='NOT_VALID' WHERE `id`='$id'";

  $result = mysqli_query($conn,$sql);

  if (mysqli_affected_rows($conn) > 0) {
      echo"<script>alert('Validasi berhasil dibatalkan !'); location.href='index.php';</script>";
  }else{
      echo"<script>alert('Validasi gagal dibatalkan !');</script>";
  }

?>
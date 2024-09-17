<?php
include_once "../koneksi.php";

$id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['id']));

$sql = "UPDATE `fikclass_users` SET `validation`='VALID' WHERE `id`='$id'";

  $result = mysqli_query($conn,$sql);

  if (mysqli_affected_rows($conn) > 0) {
      echo"<script>alert('Data berhasil divalidasi !'); location.href='valid.php';</script>";
  }else{
      echo"<script>alert('Data gagal divalidasi !');</script>";
  }

?>
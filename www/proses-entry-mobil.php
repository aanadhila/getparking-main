<?php
include "koneksi.php";
$query_mysql = mysqli_query($connect, "SELECT * FROM parkir");
$nomor = 0;
$ruangisi = 0;
$ruangtakisi = 0;
while ($data = mysqli_fetch_array($query_mysql)) {

  $nomor = $nomor + 1;
  if ($data['status'] == '1') {
    $ruangtakisi = $ruangtakisi + 1;
  } else {
    $ruangisi = $ruangisi + 1;
  }
}

$plat_nomor = $_POST['plat_nomor'];
$jenis = $_POST['jenis'];

if (!$plat_nomor) {
  echo "<script>alert('plat nomor tidak boleh kosong')</script>";
  echo "<script>window.location = 'entry-mobil.php'</script>";
} elseif (!$jenis) {
  echo "<script>alert('jenis kendaraan tidak boleh kosong')</script>";
  echo "<script>window.location = 'entry-mobil.php'</script>";
} else {
  $waktu_masuk = $_POST['waktu_masuk'];
  $bulan = $_POST['bulan'];

  $userku = $_POST['userku'];

  $qdata = "select * from mobilaktif where plat_nomor='$plat_nomor'";
  $hdata = mysqli_query($connect, $qdata);
  $rdata = mysqli_fetch_array($hdata);

  if ($rdata) {
    echo "<script>alert('Mobil telah terdaftar')</script>";
    echo "<script>window.location = 'entry-mobil.php'</script>";
  }

  if ($ruangisi == $nomor) {
    echo "<script>alert('Parkiran Penuh')</script>";
    echo "<script>window.location = 'entry-mobil.php'</script>";
  } else {
    if ($plat_nomor <> "" and $rdata['plat_nomor'] <> $plat_nomor) {
      mysqli_query($connect, "INSERT INTO tbmobil VALUES(NULL, '$plat_nomor', '$jenis' ,'$waktu_masuk','','','','','Masuk Parkir')");

      mysqli_query($connect, "INSERT INTO mobilaktif VALUES(NULL, '$plat_nomor', '$jenis' ,'$waktu_masuk')");

      mysqli_query($connect, "INSERT INTO laporankeuangan VALUES(NULL, '$plat_nomor', '$waktu_masuk','$bulan' ,'5000')");

      mysqli_query($connect, "INSERT INTO aktifitas VALUES(NULL, '$waktu_masuk','$waktu_masuk', '$userku telah memasukkan mobil berjenis $jenis <br>dengan plat nomor $plat_nomor')");

      header("location:log-parkir.php");
    } else {
      echo "<script>alert('mobil masih ada di dalam ruangan')</script>";
      echo "<script>window.location = 'entry-mobil.php'</script>";
    }
  }
}

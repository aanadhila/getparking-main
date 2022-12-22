<?php

include 'koneksi.php';


$namalengkap = $_POST['namalengkap'];
$kelamin = $_POST['kelamin'];
$no_hp = $_POST['no_hp'];
$shift = $_POST['shift'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if(!$namalengkap){
    echo "<script>alert('nama lengkap tidak boleh kosong')</script>";
    echo "<script>window.location = 'tambah-karyawan.php'</script>";
} elseif(!$no_hp){
    echo "<script>alert('nohp tidak boleh kosong')</script>";
    echo "<script>window.location = 'tambah-karyawan.php'</script>";
} elseif(!$username){
    echo "<script>alert('username tidak boleh kosong')</script>";
    echo "<script>window.location = 'tambah-karyawan.php'</script>";
} elseif(!$password){
    echo "<script>alert('password tidak boleh kosong')</script>";
    echo "<script>window.location = 'tambah-karyawan.php'</script>";
} elseif(strlen($password) < 6){
    echo "<script>alert('password minimal 6 karakter')</script>";
    echo "<script>window.location = 'tambah-karyawan.php'</script>";
} else{
    mysqli_query($connect,"INSERT INTO user VALUES(NULL, '$username', '$password' ,'$namalengkap','$kelamin','$no_hp','$shift','$level')");

    header("location:daftar-karyawan.php");
}


?>

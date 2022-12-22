<?php 

include 'koneksi.php';
$id = $_POST['id'];
$namalengkap = $_POST['namalengkap'];
$kelamin = $_POST['kelamin'];
$no_hp = $_POST['no_hp'];
$shift = $_POST['shift'];
$username = $_POST['username'];
$password = $_POST['password'];


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
mysqli_query($connect,"UPDATE user SET username ='$username', password='$password', namalengkap='$namalengkap', kelamin='$kelamin', no_hp='$no_hp', shift='$shift' WHERE id='$id'");

header("location:daftar-karyawan.php");
}
?>
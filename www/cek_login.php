<?php
include 'koneksi.php';
session_start(); //connect the connection page

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
	$result = mysqli_query($connect,$query) ;
	$rows = mysqli_num_rows($result);
        if($rows==1){
		    $row2  = mysqli_fetch_array($result);
                $_SESSION['user'] = TRUE;
        		$_SESSION['username'] = $row2['username'];
                $_SESSION['level'] = $row2['level'];
		        $_SESSION['namalengkap']= $row2['namalengkap'];
		        header("Location: home.php");

        } else{ // if not a valid user
            echo "<script>alert('Username dan password salah');window.location = 'login.php';</script>";
        }
?>
<html>
<head>
  <title>GetParking Parkir Login</title>
  <link rel="shortcut icon" href="images/parkir.png">
</head>
<body>
<style>
body {
    background-color: #FA5858;
    font-family:arial;
    font-size:20px;
}
</style>
</body>
</html>

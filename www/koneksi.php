<?php
$localhost = "db";
$username = "user";
$password = "password";
$dbname = "siparkir";

$connect = new mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
}

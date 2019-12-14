<?php

date_default_timezone_set("Asia/Jakarta");

$user = 'root';
$password = 'root';
$db = 'my_system';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$conn = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

mysqli_query($link, "SET time_zone = '+07:00'");
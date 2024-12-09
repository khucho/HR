<?php
$sname = "localhost";
$uname = "root";
$password = "";
$port = 3307;

$db_name = "hr";

$conn = mysqli_connect ($sname, $uname, $password, $db_name, $port);

if(!$conn) {
    echo "connection failed";
    exit();
}
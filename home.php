<?php
    session_start();
    include 'php/db_com.php';

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {
        $uid = $_SESSION['id'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
    }
?>

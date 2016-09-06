<?php
session_start();
    unset ($_SESSION['username']);
    session_destroy();
    require "../config/koneksi.php";
    header("location:login.php");
?>
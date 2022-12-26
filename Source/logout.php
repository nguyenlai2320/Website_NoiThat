<?php 
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['taikhoan']);
    unset($_SESSION['matkhau']);
    header('location: sign-in.php');
?>
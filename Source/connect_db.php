<?php

$host = "localhost";
$user = "nguyenhoang";
$password = "10897105";
$database = "minihouse-website";
$con = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($con,'UTF8');
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


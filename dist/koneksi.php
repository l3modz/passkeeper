<?php
$version = '1.2';

	$Open = mysqli_connect("localhost","pias","ubuntu123","passkeeper");
//$mysqli = new mysqli("localhost","root","","cuti00");
// Check connection
if ($Open -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '0c5d3c1e26e00f79356db63c97b7e4ae';
    $secret_iv = '3ed9b95e4b6f2c345836def81e570ef1';
?>

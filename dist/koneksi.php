<?php
$version = '1.2';

	$Open = mysqli_connect("localhost","usernotroot","yourpasswordhere","passkeeper");
//$mysqli = new mysqli("localhost","root","","cuti00");
// Check connection
if ($Open -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '9e0864d3666633bcd18b55602dff9180';
//$secret_key = it's md5 word from md5generator, change it as your own
    $secret_iv = '0c5d3c1e26e00f79356db63c97b7e4ae';
//$secret_iv = it's md5 word from md5generator, change it as your own
?>

<?php

$serverName = '127.0.0.1';
$username = 'root';
$password = 'cG!ijT@ybB5Mxp.F';
$dbName = 'php_native';

$conn = new mysqli($serverName, $username, $password, $dbName);

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
<?php

$dbType = 'mysql';
$dbName = 'iti';
$host = 'localhost';
$userName= 'root';
$password='';

session_start();
try {
  $conn = new PDO("$dbType:host=$host;dbname=$dbName", $userName, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
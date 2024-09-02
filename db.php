<?php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'php_db';

  try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname;",$username, $password);

  } catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
  }

?>
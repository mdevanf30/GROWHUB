<?php
  $servername = "localhost";
  $username = "root";
  $password = "211205";
  $dbname = "growhub_db";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error) {
    echo "Koneksi database gagal!";
    die("gagal!");
  }
?>
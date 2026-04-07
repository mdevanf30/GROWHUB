<?php
  include 'db_connect.php';
  if(isset($_POST['register'])){
      echo "HALO MAS MBAK SELAMAT BERGABUNG!";
      $full_name = $_POST['full_name'];
      $birth_date = $_POST['birth_date'];
      $email = $_POST['email'];
      $home_address = $_POST['home_address'];
      $phone_number = $_POST['phone_number'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      
      $sql = "INSERT INTO user (full_name, birth_date, email_address, home_address, phone_number, password) 
      VALUES ('$full_name', '$birth_date', '$email', '$home_address', '$phone_number', '$password')";

      if($conn->query($sql)){
        echo "Alhamdulillah... berhasil";
      } else {
        echo "Yah gagal cik";
      }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../daftar_mahasiswa_1.css">
</head>
<body>
<header>
    <nav class="navbar">
        <h2 class="logo">GrowHub</h2>
        <ul class="nav-links">
            <li><a href="../home.html">Home</a></li>
            <li><a href="../about.html">Tentang</a></li>
            <li><a href="">Fitur</a></li>
            <li><a href="../blog.html">Blog</a></li>
            <li><a href="">Kontak</a></li>
        </ul>
        <div class="nav-buttons">
      <a href="../php/login.php" class="btn-primary">Masuk</a>
      <a href="../php/daftar_mahasiswa_1.php" class="btn-outline">Daftar</a>    
    </div>
    </nav>
</header>

<div class="container">
    <div class="left">
        <h2>Registration</h2>
        <form action="daftar_mahasiswa_1.php" method="POST">
            <input type="text" placeholder="Full Name" name="full_name" required>
            <input type="Date" name="birth_date" required>
            <input type="email" placeholder="Email Address" name="email" required>
            <textarea placeholder="Home Address" name="home_address" required></textarea>
            <input type="text" placeholder="Phone Number" name="phone_number" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Confirm Password" name="confirm_password" required>
            <button type="submit" name="register">Daftar rek!</button>
        </form>
    </div>

    <div class="right">
        <h2>Welcome Mahasiswa & Freelancer!</h2>
    </div>
</div>

</body>
</html>
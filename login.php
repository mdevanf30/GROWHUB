<?php
  include 'db_connect.php';
  if(isset($_POST['login'])){
      echo "HALO MAS MBAK SELAMAT BERGABUNG!";
      $email = $_POST['email'];
      $password = $_POST['password'];
      
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../login.css">

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
        <h2>Login</h2>

        <form action="login.php" method="POST">
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <p style="margin-top:15px; font-size:14px;">
            Don't have an account?
            <a href="../php/daftar_mahasiswa_1.php">Register</a>
        </p>
    </div>

    <div class="right">
        <h2>Hello, Friend!</h2>
</div>

</body>
</html>

<?php
include 'db_connect.php';

if(isset($_GET['delete_user_id'])){
    $delete_id = intval($_GET['delete_user_id']);
    $sql = "DELETE FROM user WHERE user_id=$delete_id";
    if(mysqli_query($conn, $sql)){
        echo "User berhasil dihapus!";
        header("Location: admin.php");
        exit;
    } else {
        echo "Error menghapus user: " . mysqli_error($conn);
    }
}

if(isset($_POST['update'])){
    $id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $home_address = mysqli_real_escape_string($conn, $_POST['home_address']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    if($id > 0){
        $sql = "UPDATE user SET full_name='$full_name', birth_date='$birth_date', email_address='$email_address', home_address='$home_address', phone_number='$phone_number', password='$password', status='$status' WHERE user_id=$id";
        if(mysqli_query($conn, $sql)){
            echo "Data berhasil diupdate cuy!";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        echo "USER BELUM DIPILIH UNTUK DIUPDATE!";
    }
}

$user = null;
if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id=$id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Update User Data</title>
</head>
<body>
  <h1>ADMIN PANEL</h1>

    <h2>Update Data</h2>
    <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?php echo $user ? $user['user_id'] : ''; ?>">
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?php echo $user ? $user['full_name'] : ''; ?>" required>
        <br><br>

        <label>Birth Date:</label><br>
        <input type="date" name="birth_date" value="<?php echo $user ? $user['birth_date'] : ''; ?>" required>
        <br><br> 

        <label>Email Address:</label><br>
        <input type="email" name="email_address" value="<?php echo $user ? $user['email_address'] : ''; ?>" required>
        <br><br>

        <label>Home Address:</label><br>
        <textarea name="home_address" required><?php echo $user ? $user['home_address'] : ''; ?></textarea>
        <br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone_number" value="<?php echo $user ? $user['phone_number'] : ''; ?>" required>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" value="<?php echo $user ? $user['password'] : ''; ?>" required>
        <br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="<?php echo $user ? $user['status'] : ''; ?>" required>
        <br><br>

        <button type="submit" name="update">Update</button>
    </form>
    <br>

    <h2>All Users</h2>
    <?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    echo "<table border='1'> 
    <tr> 
    <th>Nama Lengkap</th> 
    <th>Tgl Lahir</th> 
    <th>Alamat Email</th> 
    <th>Alamat Rumah</th> 
    <th>Nomor Telepon</th>
    <th>Password</th>
    <th>Status Akun</th>
    <th>Actions</th>
    </tr>"; 
    while($data = mysqli_fetch_assoc($result)){ 
    echo "<tr> 
    <td>".$data['full_name']."</td> 
    <td>".$data['birth_date']."</td> 
    <td>".$data['email_address']."</td> 
    <td>".$data['home_address']."</td> 
    <td>".$data['phone_number']."</td>
    <td>".$data['password']."</td>
    <td>".$data['status']."</td>
    <td><a href='admin.php?user_id=".$data['user_id']."'>Edit</a></td>
    <td><a href='admin.php?delete_user_id=".$data['user_id']."' onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?');\">Delete</a></td>
    </tr>"; 
    } 
    echo "</table>";
    ?>
</body>
</html>


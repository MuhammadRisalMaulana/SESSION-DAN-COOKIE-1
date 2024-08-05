<?php
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
$result = mysqli_query($connect, $query);
$fetchResult = mysqli_fetch_assoc($result);
$rowcount = mysqli_num_rows($result);

if ($rowcount > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    if ($fetchResult['role'] == 'admin') {
        echo "Anda berhasil login ";
        echo "<a href='adminDashboard.php'>Admin</a>";
    } elseif ($fetchResult['role'] == 'user') {
        echo "Anda berhasil login ";
        echo "<a href='userDashboard.php'>User Dashboard</a>";
    }
} else {
    echo "Anda gagal login ";
    echo "<a href='loginForm.html'>Login Form</a>";
}

mysqli_close($connect);
?>
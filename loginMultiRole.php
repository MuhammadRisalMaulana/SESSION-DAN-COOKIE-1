
<?php
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$query= "select * from user where username ='$username' and password='$password'";
$result = mysqli_query($connect,$query);
$fetchResult = mysqli_fetch_assoc($result);

if ($fetchResult['role'] == 'admin') {
    echo "Anda berhasil login ";
    echo "<a href='adminDasboard.html'>Admin</a>";
} elseif ($fetchResult['role'] == 'user') {
    echo "Anda berhasil login ";
    echo "<a href='userDashboard.html'>User Dasboard</a>";
} else {
    echo "Anda gagal login ";
    echo " <a href='loginForm.html'>Login Form</a>";
}
mysqli_close($connect);
?>
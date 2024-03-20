<?php

/* Pastikan submit pada button memiliki name yaitu submit */ 

if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  password_verify($password, PASSWORD_DEFAULT);

  if($username == "" || $password == ""){
    header("location:index.php");
    exit(0);
  }

  $table = ""; /* Table pada username dan password untuk table database */
  $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
  $row = $koneksi->query($sql);
  $cek = mysqli_num_rows($row);

  if($cek > 0){
    echo "<script lang='javascript'>alert('Selamat anda berhasil login ke halaman dashboard');</script>";
    echo "<script lang='javascript'>window.location.href= 'dashboard/index.php';</script>";
  } else {
    echo "<script lang='javascript'>alert('anda tidak berhasil login ke halaman dashboard');</script>";
    echo "<script lang='javascript'>window.location.href= 'index.php';</script>";
  }
}
?>

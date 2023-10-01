<?php

session_start();

include 'koneksi.php';

$username=$_POST['username'];
$password=$_POST['password'];
$data1=mysqli_query($koneksi,"SELECT*FROM siswa WHERE nama='$username' AND nisn='$password'");
$status1=mysqli_fetch_array($data1);
$cek1=mysqli_num_rows($data1);

$data2=mysqli_query($koneksi,"SELECT level,id_petugas FROM petugas WHERE username='$username' and password='$password'");
$status2=mysqli_fetch_array($data2);
$cek2=mysqli_num_rows($data1);

if($cek1>0){
    $_SESSION['nama'] = $username;
    $_SESSION['nisn'] = $password;
    $_SESSION['stts']="login";
    header('location:../src/user/dashboard.php');
}elseif($cek2>0){
    if ($status2[0]=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['stts']="login";
        $_SESSION['id_petugas']="$status2[1]";
        header('location:../src/admin/dashboard.php');
    } elseif ($status2[0] == "petugas") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['stts'] = "login";
        $_SESSION['id_petugas'] = "$status2[1]";
        header('location:../src/petugas/dashboard.php');
    }
}else{
    //   echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    //     echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',footer: '<a href=''>Why do I have this issue?</a>'})</script>";
    echo "<script>alert('account not found')</script>";
    echo "<script>setTimeout(function(){document.location='../index1.html'},0,0001);</script>";
}

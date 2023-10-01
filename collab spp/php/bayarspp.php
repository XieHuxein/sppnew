<?php
include 'koneksi.php';
$idpembayaran=$_POST['idpembayaran'];
$poto=$_POST['foto'];
$tanggal=date('Y-m-d');
$poto=uploadGambar();
$data=mysqli_query($koneksi," UPDATE pembayaran set tgl_bayar='$tanggal',foto='$poto',status='Sedang proses' 
                              WHERE id_pembayaran='$idpembayaran'");
if(isset($data)){
   
    echo "data saved";
    header("location:../src/user/dashbord-user.php");
    exit;

}else{
    echo "<script>alert('data not saved!!')</script>";
    echo "<script>setTimeout(function(){document.location='../src/user/dashbord-user.php'},0,0001);</script>";
    exit;
}

function uploadGambar(){
   
$namaFile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../UPLOAD/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}
return $namaFile;
}

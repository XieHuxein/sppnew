<?php   
$host= "localhost";
$user= "root";
$password= "";
$database= "spphuxen";
$koneksi=mysqli_connect($host, $user ,$password);
if($koneksi){
    // echo "YOUR SERVER IS ONLINE <br>";
}else{
    echo "YOUR SERVER IS OFFLINE <br>";
}

$dboke=mysqli_select_db($koneksi,$database);
if($dboke){
    // echo "DATABASE CONNECTION SUCCESS <br>";
}else{
    echo "DATABASE CONNECTION FAILED <br>";
}
?>
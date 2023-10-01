<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:../../index1.html");
}
include 'php/koneksi.php';

$nisn = $_SESSION['nisn'];
$jumlahDataPerhalaman = 5;
$Data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn where pembayaran.nisn='$nisn'");
$jumlahSemuaData = mysqli_num_rows($Data);
$halaman = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
$mulaiHalaman = ($halaman > 1) ? ($halaman * $jumlahDataPerhalaman) - $jumlahDataPerhalaman : 0;
$jumlahHalaman = ceil(($jumlahSemuaData / $jumlahDataPerhalaman));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fonts -->
    <link rel="icon" href="img/nav-logo.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,800;1,500;1,700&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,500;1,700&family=Poppins:ital,wght@0,300;0,800;1,500;1,700&display=swap" rel="stylesheet" />

    <link rel="import" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;800;900&display=swap" />
    <!-- styling css -->
    <link rel="stylesheet" href="style/d1.css" />

    <!-- Boxicons css -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <title>Dashboard</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="users">
                <div class="userDisplay">
                    <span class="fotoDisplay">
                        <img class="foto-user" src="img/nav-logo-land.png" alt="">
                        <h3>aijin <span class="side-text">Pay</span>.</h3>
                    </span>
                    <div class="nameDisplay">
                        <?php
                        include 'php/koneksi.php';
                        $nisn = $_SESSION['nisn'];
                        $data1 = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas where siswa.nisn='$nisn'");
                        $hasil = mysqli_fetch_array($data1);
                        ?>
                        Nama : <?php echo $_SESSION['nama'] ?> <br>
                        Nisn : <?php echo $_SESSION['nisn'] ?> <br>
                        <?php
                        echo "Kelas : $hasil[nama_kelas] <br>";
                        ?>
                    </div>
                </div>
            </div>
            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#" data-target="Dashboard">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" data-target="Manage">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">History</span>
                        </a>
                    </li>
                    <li class="nav-link" id="logout">
                        <a href="../../php/keluar.php">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">LOGOUT</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <section class="about" id="Dashboard">
            <h1>Selamat datang di Dashboard Siswa,<?php echo $_SESSION['nama'] ?> </h1>
            <div class="table-container">
                <div class="pages">
                    <br />
                    <?php
                    for ($i = 1; $i <= $jumlahHalaman; $i++) {
                    ?>
                        <a href="Dashboard.php?pages=<?php echo "$i"; ?>"><?php echo "$i"; ?></a>
                    <?php
                    }
                    ?>
                </div>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>SPP</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn where pembayaran.nisn='$nisn' limit $mulaiHalaman,$jumlahDataPerhalaman");
                            while ($kolom = mysqli_fetch_array($data)) {
                                echo "<Tr>
                        <td>GAT-0$kolom[id_pembayaran]</td>
                        <td>$kolom[nisn]</td>
                        <td>$kolom[nama]</td>
                        <td>$kolom[tgl_bayar]</td>
                        <td>$kolom[bulan_bayar]</td>
                        <td>$kolom[tahun_bayar]</td>
                        <td>$kolom[id_spp]</td>
                        <td>$kolom[jumlah_bayar]</td>
                        <td>$kolom[status]</td>";
                                if ($kolom['status'] == "Belum bayar") {
                                    echo "
                        <td><a href='dash-try.php?idpembayaran=$kolom[id_pembayaran]&status=$kolom[status]'><button class='cta-daf-tab btn-bayar' data-idpembayaran='$kolom[id_pembayaran]' data-status='$kolom[status]'>Bayar</button></a></td>";
                                } else {
                                    if ($kolom['status'] == "Lunas") {
                            ?>
                                        <td><button class="cta-daf-tab"><a href='../laporan/struk.php?idpembayaran=<?php echo $kolom[0] ?>' onClick="return confirm('Yakin Cetak Bukti?')">
                                                    Cetak Bukti </a> </td>
                            <?php
                                    } else {
                                        echo "<td>$kolom[status]</td>";
                                    }
                                    echo "  </tr>";
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Form Pembayaran (Popup) -->
            <div class="popup-form" id="payment-form" style="display: none;">
                <div class="pay-form">
                    <div class="close-popup" id="close-payment-form">&times;</div>
                    <h2>Form Pembayaran</h2>
                    <label>ID Pembayaran:</label>
                    <span id='payment-id'></span>
                    <label>Status:</label>
                    <span id='payment-status'></span>
                    <script>
                        document.getElementById('payment-id').textContent = id_pembayaran; // Mengisi nilai id_pembayaran ke elemen span
                        document.getElementById('payment-status').textContent = status; // Mengisi nilai status ke elemen span
                    </script>
                    <?php
                    $status = isset($_GET['status']) ? $_GET['status'] : ''; // Mengambil status dari JavaScript
                    $id_pembayaran = isset($_GET['id_pembayaran']) ? $_GET['id_pembayaran'] : ''; // Mengambil id_pembayaran dari JavaScript
                    
                    // Periksa apakah 'status' dan 'id_pembayaran' ada dalam URL
                    if ($status && $id_pembayaran) {
                        $data = mysqli_query($koneksi, "SELECT * FROM pembayaran
                        INNER JOIN siswa ON pembayaran.nisn = siswa.nisn
                        INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                        WHERE id_pembayaran='$id_pembayaran'");

                        while ($kolom = mysqli_fetch_array($data)) {
                            echo " 
                            <h1>AKU JAWIRR NIGGA</h1>
                            <form method='post' action='php/bayarspp.php' enctype='multipart/form-data'>
                                <div class='input_field'>
                                    <label>Nisn</label>
                                    <input type='hidden' name='idpembayaran' value='<?php echo $kolom[0]; ?>'>
                                    <input type='text' name='nisn' value='<?php echo $kolom[2]; ?>' disabled>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <label>Nama</label>
                                    <input type='text' name='nama' value='<?php echo $kolom[nama]; ?>' disabled>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <label>Kelas</label>
                                    <input type='text' name='kelas' value='<?php echo $kolom[nama_kelas]; ?>' disabled>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <label>Bulan</label>
                                    <input disabled type='text' name='bulan' value='<?php echo $kolom[4]; ?>'>
                                    </div>
                                <p>
                                <div class='input_field'>
                                <label>Tahun</label>
                                    <input disabled type='text' name='tahun' value='<?php echo $kolom[5]; ?>'>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <label>Spp</label>
                                    <input disabled type='text' name='spp' value='<?php echo 'Rp. ' . number_format($kolom[7], 2, ',', '.') ?>'>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <label>Bukti Transfer</label>
                                    <input type='file' name='foto' placeholder='poto...' size='45'>
                                </div>
                                <p>
                                <div class='input_field'>
                                    <input class='simpan' type='submit' value='Simpan' onClick='return confirm('Yakin Di rubah')'></a>
                                </div>
                            </form>
                </div>
            </div>
    </div>";
                    ?>

                    <?php
                        }
                    } else {
                        // Data tidak diterima dengan benar, tampilkan pesan kesalahan atau tindakan yang sesuai
                        echo "Data tidak diterima dengan benar.";
                    }
                    ?>
                    <!-- Form pembayaran lainnya -->
        </section>
        
        <section class="about" id="Manage" style="display: none;">
            <h1>History Pembayaran</h1>
            <div class="table-manage">
                <table cellspacing="0" id="manage-table">
                    <thead>
                        <tr>
                            <th class="searchbar" colspan="12" style="text-align:left">
                                <form method="post">
                                    <input type="search" placeholder="Cari Pembayaran......" name="bulanbayar" value="">
                                    <button class="cta-daf-man">search</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>SPP</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (isset($_POST['bulan']) == "") {
                                $data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn where pembayaran.nisn='$nisn' And status='Lunas'");
                            } else {
                                $bulan = $_POST['bulan'];
                                $data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn where pembayaran.nisn='$nisn' And bulan_bayar='$bulan'");
                            }
                            while ($kolom = mysqli_fetch_array($data)) {
                                echo "<tr>
                        <td>GAT-0$kolom[id_pembayaran]</td>
                        <td>$kolom[nisn]</td>
                        <td>$kolom[nama]</td>
                        <td>$kolom[tgl_bayar]</td>
                        <td>$kolom[bulan_bayar]</td>
                        <td>$kolom[tahun_bayar]</td>
                        <td>$kolom[id_spp]</td>
                        <td>$kolom[jumlah_bayar]</td>
                        </tr>" ?>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
    <script src="js/styling.js"></script>
    <!-- <script src="../../js/animate.js"></script> -->
</body>

</html>

<!-- <div class="navbar">
        <a href="#" class="navbar-logo"><img src="../../img/nav-logo.png" alt="Gaijin"> <text class="text-nav">aijin <span>Academy</span>.</text></a>
    </div> -->
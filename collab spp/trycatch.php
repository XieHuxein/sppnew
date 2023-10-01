<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:index1.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Siswa</title>
</head>

<body>
    <!-- Tabel Data Pembayaran -->
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
            <?php
            include "php/koneksi.php";
            $nisn = $_SESSION['nisn'];
            $jumlahDataPerhalaman = 5;
            $Data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn where pembayaran.nisn='$nisn'");
            $jumlahSemuaData = mysqli_num_rows($Data);
            $halaman = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
            $mulaiHalaman = ($halaman > 1) ? ($halaman * $jumlahDataPerhalaman) - $jumlahDataPerhalaman : 0;
            $jumlahHalaman = ceil(($jumlahSemuaData / $jumlahDataPerhalaman));

            while ($kolom = mysqli_fetch_array($Data)) {
                echo "<tr>
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
                    echo "<td><button class='cta-daf-tab btn-bayar' 
                                data-idpembayaran='$kolom[id_pembayaran]' 
                                data-status='$kolom[status]'>Bayar</button></td>";
                } else if ($kolom['status'] == "Lunas") {
                    echo "<td><a href='../laporan/struk.php?idpembayaran=$kolom[id_pembayaran]' 
                                onClick=\"return confirm('Yakin Cetak Bukti?')\">Cetak Bukti</a></td>";
                } else {
                    echo "<td>$kolom[status]</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Form Pembayaran (Popup) -->
    <div class="popup-form" id="payment-form" style="display: none;">
        <div class="pay-form">
            <div class="close-popup" id="close-payment-form">&times;</div>
            <h2>Form Pembayaran</h2>\
            <!-- <?php
            $id_pembayaran = 
            $data = mysqli_query($koneksi, "SELECT * FROM pembayaran
            INNER JOIN siswa ON pembayaran.nisn = siswa.nisn
            INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            WHERE id_pembayaran='$id_pembayaran'");

            while ($kolom = mysqli_fetch_array($data)) {
                ?> -->
            <!-- Formulir Pembayaran -->
            <form method='post' action='php/bayarspp.php' enctype='multipart/form-data'>
                <div class='input_field'>
                    <label>NISN</label>
                    <input type='text' name='nisn' id='nisn' disabled>
                </div>
                <div class='input_field'>
                    <label>Nama</label>
                    <input type='text' name='nama' id='nama' disabled>
                </div>
                <div class='input_field'>
                    <label>Bulan Pembayaran</label>
                    <input type='text' name='bulan' id='bulan' disabled>
                </div>
                <div class='input_field'>
                    <label>ID SPP</label>
                    <input type='text' name='idspp' id='idspp' disabled>
                </div>
                <div class='input_field'>
                    <label>Kelas</label>
                    <input type='text' name='kelas' id='kelas' disabled>
                </div>
                <div class='input_field'>
                    <label>Tahun Bayar</label>
                    <input type='text' name='tahun' id='tahun' disabled>
                </div>
                <div class='input_field'>
                    <label>Bukti Transfer</label>
                    <input type='file' name='foto' placeholder='Foto...' size='45'>
                </div>
                <div class='input_field'>
                    <input class='simpan' type='submit' value='Simpan' onClick="return confirm('Yakin Di rubah')">
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        // Tangkap elemen tombol Bayar dan popup pembayaran
        var bayarButton = document.getElementsByClassName("btn-bayar");
        var paymentForm = document.getElementById("payment-form");

        // Tangkap elemen input dalam form pembayaran
        var nisnInput = document.getElementById("nisn");
        var namaInput = document.getElementById("nama");
        var bulanInput = document.getElementById("bulan");
        var idsppInput = document.getElementById("idspp");
        var kelasInput = document.getElementById("kelas");
        var tahunInput = document.getElementById("tahun");

        // Tambahkan event listener pada setiap tombol Bayar
        for (var i = 0; i < bayarButton.length; i++) {
            bayarButton[i].addEventListener("click", function() {
                // Ambil data atribut dari tombol Bayar
                var idPembayaran = this.getAttribute("data-idpembayaran");
                var status = this.getAttribute("data-status");

                // Tampilkan popup pembayaran
                paymentForm.style.display = "block";

                // Isi input dalam form dengan data yang sesuai
                nisnInput.value = ""; // Isi dengan data sesuai kebutuhan
                namaInput.value = ""; // Isi dengan data sesuai kebutuhan
                bulanInput.value = ""; // Isi dengan data sesuai kebutuhan
                idsppInput.value = ""; // Isi dengan data sesuai kebutuhan
                kelasInput.value = ""; // Isi dengan data sesuai kebutuhan
                tahunInput.value = ""; // Isi dengan data sesuai kebutuhan
            });
        }

        // Tambahkan event listener untuk menutup popup pembayaran
        document.getElementById("close-payment-form").addEventListener("click", function() {
            paymentForm.style.display = "none";
        });
    </script>
</body>

</html>
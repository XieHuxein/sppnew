// function target mark
function setActiveLink(event) {
    const links = document.querySelectorAll('.sidebar a');
    links.forEach(link => link.classList.remove('active'));

    const clickedLink = event.currentTarget;
    clickedLink.classList.add('active');

    const activeIndicator = document.querySelector('.sidebar a.active::before');
    if (activeIndicator) {
        activeIndicator.style.height = `${clickedLink.clientHeight}px`;
    };
}

const links = document.querySelectorAll('.sidebar a');
links.forEach(link => link.addEventListener('click', setActiveLink));

// // function sidebar toggle
// const body = document.querySelector("body"),
//     sidebar = document.querySelector(".sidebar"),
//     toggle = document.querySelector(".toggle");

// toggle.onclick = () => {
//     sidebar.classList.toggle("close");
// }

// function change interface
// Simpan elemen-elemen yang diperlukan dalam variabel
const dashboardSection = document.getElementById('Dashboard');
const manageSection = document.getElementById('Manage');

// Daftar tautan menu
const menuLinks = document.querySelectorAll('.nav-link a');

// Loop melalui setiap tautan dan tambahkan event listener
menuLinks.forEach(link => {
    link.addEventListener('click', showSection);
});

// Fungsi untuk menampilkan bagian yang sesuai berdasarkan tautan yang diklik
function showSection(event) {
    event.preventDefault();
    event.stopPropagation(); // Menghentikan event bubbling

    // Semua bagian disembunyikan terlebih dahulu
    dashboardSection.style.display = 'none';
    manageSection.style.display = 'none';


    // Periksa tautan mana yang diklik dan tampilkan bagian yang sesuai
    const targetSection = event.currentTarget.getAttribute('data-target');
    if (targetSection === 'Dashboard') {
        dashboardSection.style.display = 'block';
    } else if (targetSection === 'Manage') {
        manageSection.style.display = 'block';
    }

    if (event.currentTarget.parentElement.id === 'logout') {
        document.location = '../../php/keluar.php'
    }
}


    // Temukan semua tombol "Bayar" di tabel dashboard
    const btnBayarElements = document.querySelectorAll('.btn-bayar');

    // Tambahkan event listener untuk setiap tombol "Bayar"
    btnBayarElements.forEach(btnBayar => {
        btnBayar.addEventListener('click', showPaymentForm, urlVar);
    });

function urlVar(event) {

    // Ambil data 'id_pembayaran' dan 'status' dari tombol "Bayar" yang diklik
    const idPembayaran = event.currentTarget.getAttribute('data-idpembayaran');
    const statusp = event.currentTarget.getAttribute('data-status');

    var id_pembayaran = idPembayaran;
    var status = statusp;

    // Membangun URL dengan parameter
    var url = "http://localhost/sppnew/dash-try.php?id_pembayaran=" + id_pembayaran + "&status=" + status;

    // Mengarahkan pengguna ke URL dengan parameter
   window.location.href = url;

    }

    function showPaymentForm(event) {
        // event.preventDefault();
        // // Tampilkan popup form pembayaran
        const paymentForm = document.querySelector('.popup-form');
        // const paymentId = document.getElementById('payment-id');
        // const paymentStatus = document.getElementById('payment-status');
        // Dalam JavaScript

        paymentForm.style.display = 'block';
    }


    // Tombol tutup untuk menutup form pembayaran
    const closePaymentForm = document.getElementById('close-payment-form');
    closePaymentForm.addEventListener('click', () => {
        const paymentForm = document.getElementById('payment-form');
        paymentForm.style.display = 'none';
    });


    // new function

    const toggle = document.querySelector(".toggle");
    const side = document.querySelector(".sidebar");
    const popupForm = document.querySelector(".popup-form");

    // Fungsi untuk mengubah margin-top dan margin-left popup-form
    function updatePopupFormPosition() {
        if (side.classList.contains("close")) {
            popupForm.style.marginTop = "-39rem";
            popupForm.style.marginLeft = "-6.5rem";
        } else {
            popupForm.style.marginTop = "-39.5rem";
            popupForm.style.marginLeft = "-20.5rem";
        }   
    }

    // Panggil fungsi saat halaman dimuat
    updatePopupFormPosition();

    // Tambahkan event listener untuk mendeteksi perubahan pada sidebar
    toggle.addEventListener("click", function() {
        side.classList.toggle("close");
        updatePopupFormPosition();
    });

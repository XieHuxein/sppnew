// function change interface
// Simpan elemen-elemen yang diperlukan dalam variabel
const dashboardSection = document.getElementById('Dashboard');
const manageSection = document.getElementById('Manage');
// const topUpSection = document.getElementById('TopUp');
// const paymentSection = document.getElementById('Payment');
// const registSection = document.getElementById('Register');

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
    // topUpSection.style.display = 'none';
    // paymentSection.style.display = 'none';
    // registSection.style.display = 'none';

    // Periksa tautan mana yang diklik dan tampilkan bagian yang sesuai
    const targetSection = event.currentTarget.getAttribute('data-target');
    if (targetSection === 'Dashboard') {
        dashboardSection.style.display = 'block';
    } else if (targetSection === 'Manage') {
        manageSection.style.display = 'block';
    }
    // } else if (targetSection === 'TopUp') {
    //     topUpSection.style.display = 'block';
    // } else if (targetSection === 'Payment') {
    //     paymentSection.style.display = 'block';
    // } else if (targetSection === 'Register') {
    //     registSection.style.display = 'block';
}
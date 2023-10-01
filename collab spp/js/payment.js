
// Temukan semua tombol "Bayar" di tabel dashboard
const btnBayarElements = document.querySelectorAll('.btn-bayar');

// Tambahkan event listener untuk setiap tombol "Bayar"
btnBayarElements.forEach(btnBayar => {
    btnBayar.addEventListener('click', showPaymentForm);
});

function showPaymentForm(event) {
    event.preventDefault();

    // Ambil data 'id_pembayaran' dan 'status' dari tombol "Bayar" yang diklik
    const idPembayaran = event.currentTarget.getAttribute('data-idpembayaran');
    const status = event.currentTarget.getAttribute('data-status');

    // Tampilkan popup form pembayaran
    const paymentForm = document.getElementById('payment-form');
    const paymentId = document.getElementById('payment-id');
    const paymentStatus = document.getElementById('payment-status');

    paymentId.textContent = idPembayaran;
    paymentStatus.textContent = status;

    paymentForm.style.display = 'block';
}

// Tombol tutup untuk menutup form pembayaran
const closePaymentForm = document.getElementById('close-payment-form');
closePaymentForm.addEventListener('click', () => {
    const paymentForm = document.getElementById('payment-form');
    paymentForm.style.display = 'none';
});

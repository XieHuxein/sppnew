function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.onload = function () {
    reveal();
};
window.addEventListener("scroll", reveal);


// new function

// Ambil elemen form pembayaran dan tombol "Tutup"
const popupForm = document.querySelector('.popup-form');
const closePopupButton = document.querySelector('.close-popup');

// Fungsi untuk menampilkan form pembayaran
function showPaymentForm() {
  popupForm.style.display = 'block';
}

// Fungsi untuk menyembunyikan form pembayaran dengan animasi fadeOut
function hidePaymentForm() {
  popupForm.style.animation = 'fadeOut 0.3s ease-in forwards';

  // Set timeout untuk menghilangkan form setelah animasi selesai
  setTimeout(() => {
    popupForm.style.display = 'none';
    popupForm.style.animation = ''; // Reset animasi
  }, 300); // Sesuaikan dengan durasi animasi
}

// Tambahkan event listener untuk tombol "Tutup"
closePopupButton.addEventListener('click', hidePaymentForm);

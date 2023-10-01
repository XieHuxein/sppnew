const popup = document.querySelector(".btn");
const hide = document.querySelector(".close-btn");
const show = document.querySelector(".popup-card");

popup.onclick = () => {
    show.classList.add("active");
}
hide.onclick = () => {
    show.classList.remove("active");
}
// cta.onclick = () => {
//     reveal.classList.add("active");
// }

// function cta() {
//     reveal.classList.add("active");
// }
// document.getElementById("#cta").addEventListener('click', function () {
//     document.querySelector(".popup-card").classList.add("active");
// });
// document.querySelector(".btn").addEventListener('click', function () {
//     document.querySelector(".popup-card").classList.add("active");
// });
// document.querySelector(".close-btn").addEventListener("click", function () {
//     document.querySelector(".popup-card").classList.remove("active");
// });


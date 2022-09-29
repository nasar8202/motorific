//active class

let menutoggle = document.querySelector('.toggle');
let menunav = document.querySelector('.navi');
menutoggle.onclick = function () {
    menutoggle.classList.toggle('active');
    menunav.classList.toggle('active');

}
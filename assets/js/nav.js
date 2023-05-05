const nav = document.querySelector("nav");
const changeNav = nav.querySelector(".changeNav");
const change = nav.querySelectorAll("i");
const div = nav.querySelectorAll("div")[0];

function changeNavFunction () {
    changeNav.classList.toggle("hidden");
    changeNav.classList.toggle("hidden");

    change[0].classList.toggle("hidden");
    change[1].classList.toggle("hidden");
    div.classList.toggle("bg-main-white");
    div.classList.toggle("bg-main-lightred");

}
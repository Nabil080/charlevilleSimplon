const sectionChange = document.getElementsByClassName('sectionChange');
const tabChange = document.getElementsByClassName('tabChange');

function changeTab(y) {
    for (i = 0; i < sectionChange.length; i++) {
        sectionChange[i].classList.add("hidden");
        tabChange[i].classList.remove("!bg-main-red");
        tabChange[i].classList.add("bg-main-gray");

    }
    sectionChange[y].classList.remove("hidden");
    tabChange[y].classList.add("!bg-main-red");
}
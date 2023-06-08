const progressBar = document.querySelectorAll('.progressBar');

let array = Array.from(progressBar);

for (let i = 0; i < array.length; i++) {
    let bar = array[i];
    bar.classList.remove("bg-green-600", "bg-orange-600", "bg-red-600")
    if (bar.dataset.width > 60) {
        bar.classList.add("bg-green-600");
    } else if (bar.dataset.width < 35) {
        bar.classList.add("bg-red-600");
    } else if (bar.dataset.width < 60) {
        bar.classList.add("bg-orange-600");
    } 
}
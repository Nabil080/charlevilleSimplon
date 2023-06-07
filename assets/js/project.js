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

// const svg = document.getElementById("animation");

// function addFirst()
// {
//     svg.insertAdjacentHTML("beforeend", `<line x1="10" x2="20" y1="20" y2="70" stroke="black" stroke-width="5"/>`);
// }
// function addSecond() 
// {
//     svg.insertAdjacentHTML("beforeend", `<line x1="20" x2="10" y1="75" y2="120" stroke="black" stroke-width="5"/>`);
// }
// function addThird()
// {
//     svg.insertAdjacentHTML("beforeend", `<line x1="10" x2="20" y1="125" y2="180" stroke="black" stroke-width="5"/>`);
// }
// function addFourth()
// {
//     svg.insertAdjacentHTML("beforeend", `<line x1="20" x2="10" y1="185" y2="250" stroke="black" stroke-width="5"/>`);

// }
// function addLast()
// {
//     svg.insertAdjacentHTML("afterend", `<img src="assets/img/drapeau-de-la-ligne-darrivee.png" class="h-[50px] justify-self-start">`);
// }

// function animate() 
// {
//     setTimeout(addFirst, 500);
//     setTimeout(addSecond, 1000);
//     setTimeout(addThird, 1500);
//     setTimeout(addFourth, 2000);
//     setTimeout(addLast, 3000);
// }

// animate();

const tableau = [
  {
    nom: "GAUDIN Florian",
    description: "Aller à Simplon m'a permis d'apprendre à être un vrai développeur. J'ai appris l'HTML et le JS.",
    sourceImage: "assets/img/avatar/florian.jpg",
    promo_id: "1",
    promo: "Developpeur Web 2023"
  },
  {
    nom: "BELILA Nabil",
    description: `Dans une école de développeur, j'ai plongé dans un océan de connaissances.
    Chaque jour, j'ai exploré de nouveaux horizons.`,
    sourceImage: "assets/img/avatar/nabil.jpg",
    promo_id: "1",
    promo: "Developpeur Web 2023"
  },
  {
    nom: "DUCRET Bryan",
    description: `Grâce à mon école de développeur, j'ai acquis une multitude de connaissances précieuses.`,
    sourceImage: "assets/img/avatar/bryan.jpg",
    promo_id: "1",
    promo: "Developpeur Web 2023"
  },
  {
      nom: "GUERET Louis",
      description: "J'ai acquis tant de compétences qui m'ont permis de devenir un développeur confiant et polyvalent.",
      sourceImage: "assets/img/avatar/louis.jpg",
      promo_id: "1",
      promo: "Developpeur Web 2023"
  },
  {
      nom: "TOUPET Jéremie",
      description: "Grâce à mon école de développeur, j'ai absorbé une mine de savoir-faire, forgeant ainsi mon expertise technique.",
      sourceImage: "assets/img/avatar/jerem.jpg",
    promo_id: "1",
      promo: "Developpeur Web 2023"
    },
    {
      nom: "AL YEMENI Khaled",
      description: "Mon école de développeur m'a inculqué une expertise solide, nourrissant ma passion pour la programmation.",
      sourceImage: "assets/img/avatar/khaled.jpg",
      promo_id: "1",
      promo: "Developpeur Web 2023"
    },
    {
      nom: "El IDRISSI Ziad",
      description: "Grâce à mon école de développeur, j'ai acquis des compétences pointues qui ont renforcé ma carrière en programmation.",
      sourceImage: "assets/img/avatar/ziad.jpg",
      promo_id: "1",
      promo: "Developpeur Web 2023"
    },
    {
      nom: "CARREIRA DA CRUZ Sylvie",
      description: "Grâce à cet établissement, j'ai acquis une précieuse expertise qui a enrichi ma carrière dans la programmation.",
      sourceImage: "assets/img/avatar/sylvie.jpg",
      promo_id: "1",
      promo: "Developpeur Web 2023"
    },
    {
      nom: "GERARDIN Stanislas",
      description: "Cette institution m'a offert une formation incroyable, me dotant des compétences pour exceller dans mon domaine.",
      sourceImage: "assets/img/avatar/stanislas.jpg",
      promo_id: "1",
      promo: "Developpeur Web 2023"
    },
];

function getRandomNumber () 
{
    for (i = 0; i < 100; i ++) {
        let randomNumber1 = Math.floor(Math.random() * tableau.length);
        let randomNumber2 = Math.floor(Math.random()* tableau.length);
        if (randomNumber1 !== randomNumber2) {
            const array = [randomNumber1, randomNumber2];
            return array;
        }
    }
}

const showCards = () => {

    const commentSection = document.getElementById('commentSection');
    let array = getRandomNumber();
    let hidden = 0;
    for (i = 0; i < array.length; i++) {
        let number = array[i];
        commentSection.insertAdjacentHTML('beforeend', `
            <div class=" max-w-sm bg-main-white  shadow-lg ${hidden} rounded-lg overflow-hidden my-4">
                <div class="py-4 px-6">
                    <div class="grid grid-cols-2 items-center">
                        <img class="w-32 mx-auto h-32 rounded-full object-cover object-center" src="${tableau[number]['sourceImage']}" alt="avatar">
                        <p class="text-2xl font-semibold text-gray-800 text-center italic">${tableau[number]['nom']}</p>
                    </div>
                    <p class="py-2 text-lg text-gray-700">${tableau[number]['description']}</p>
                    <div class="flex justify-between w-full items-center">
                        <i class="fa-solid fa-code w-1/5 text-main-red text-3xl"></i>
                        <a href="?action=promotionPage&id=1" class="bg-main-red py-2 px-4 w-4/6  rounded-full text-center text-main-white my-2 border border-main-white hover:bg-main-white hover:text-main-red hover:border hover:border-main-red">
                            ${tableau[number]['promo']}
                            </a>
                        <i class="fa-solid fa-database w-1/5 text-main-red text-3xl text-right"></i>
                    </div>
                </div>
            </div>
        `)
          hidden = "hidden lg:block";
    }
};

window.addEventListener("onload", showCards());


  document.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    const navbarHeight = navbar.clientHeight;

    if (window.pageYOffset >= navbarHeight) {
        navbar.classList.add("fixed-top");
    } else {
        navbar.classList.remove("fixed-top");
    }
});

async function typeSentence(sentence, eleRef, delay = 100){
    const letters = sentence.split("");
    let i =0;
    while(i<letters.length){
        await waitForMs(delay);
        $(eleRef).append(letters[i]);
        i++;
    }
    return;
}
function waitForMs(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}

$( document ).ready(async function() {
    await typeSentence("Heroes come in all types, but they share one common trait – the willingness to give.", "#sentence");
    await waitForMs(2000);
  });

  


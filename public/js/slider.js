document.addEventListener("DOMContentLoaded", (event) => {
    let element = document.querySelector(".slide-auto>li:first-child");
    element.classList.add("active");

    let sliders = document.querySelectorAll(".slide-manual");
    for (let i = 0; i < sliders.length; i++) {
        let firstImg = sliders[i].querySelector("img");
        let imgCount = sliders[i].querySelectorAll("img").length;
        if (firstImg) {
            firstImg.classList.add("visible");
            if (imgCount == 1) {
                sliders[i].querySelector(".next").classList.add("button-hidden");
                sliders[i].querySelector(".prev").classList.add("button-hidden");
                firstImg.classList.add("unique-img");
            }
        } else {
            sliders[i].querySelector(".next").classList.add("button-hidden");
            sliders[i].querySelector(".prev").classList.add("button-hidden");
        }
    }

    let next = document.querySelectorAll("div.next");
    let prev = document.querySelectorAll("div.prev");
    for (let i = 0; i < next.length; i++) {
        next[i].addEventListener("click", (event) => NextImage(event));
    }
    for (let i = 0; i < prev.length; i++) {
        prev[i].addEventListener("click", (event) => PrevImage(event));
    }
});
    // function pour passer à l'image suivante sur le slider manuel
function NextImage(event) {
    let fleche = event.target;
    let slider_manual_div = fleche.parentElement.parentElement;

    let imgList = slider_manual_div.querySelectorAll("img");
    let imgIndex = 0;

    while (imgIndex < imgList.length) {
        if (imgList[imgIndex].classList.contains("visible")) {
            break;
        }
        imgIndex++;
    }

    let activeImg = imgList[imgIndex];

    // Vérification de la position de l'image dans le tableau.
    if (imgIndex + 1 >= imgList.length) {
        imgIndex = 0;
    } else {
        imgIndex++;
    }
    imgList[imgIndex].classList.add("visible");
    activeImg.classList.remove("visible");
}
    // function pour revenir à l'image précédente sur le slider manuel
function PrevImage(event) {
    let fleche = event.target;
    let slider_manual_div = fleche.parentElement.parentElement;

    let imgList = slider_manual_div.querySelectorAll("img");
    let imgIndex = 0;

    while (imgIndex < imgList.length) {
        if (imgList[imgIndex].classList.contains("visible")) {
            break;
        }
        imgIndex++;
    }

    let activeImg = imgList[imgIndex];

    // Vérification de la position de l'image dans le tableau.
    if (imgIndex - 1 < 0) {
        imgIndex = imgList.length - 1;
    } else {
        imgIndex--;
    }
    imgList[imgIndex].classList.add("visible");
    activeImg.classList.remove("visible");
}
    // function pour le slider automatique avec un interval de 3500 m/s
setInterval(function (nextSlide) {
    let actif = document.querySelector(".active");
    actif.classList.remove("active");
    let nonActif = actif.nextElementSibling;
    if (nonActif == null) {
        nonActif = document.querySelector(".slide-auto>li:first-child");
    }
    nonActif.classList.add("active");
}, 3500);

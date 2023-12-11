document.addEventListener("DOMContentLoaded", (event) => {
    let elements = document.getElementsByClassName("description-limit");
    // definition d'une limite du nombre de caractère pour les description des article de la page accueil
    for (let i = 0; i < elements.length; i++) {
        let tabMots = elements[i].innerText.split(" ");
        let descFinal = "";
        let indexMots = 0;
        while (descFinal.length < 80 && indexMots < tabMots.length) {
            if (descFinal.concat(" " + tabMots[indexMots].length).length > 80) {
                break;
            } else {
                descFinal = descFinal.concat(" " + tabMots[indexMots]);
            }
            indexMots++;
        }
        elements[i].innerText = descFinal + "…";
    }
});

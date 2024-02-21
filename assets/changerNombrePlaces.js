// Ajout d'un addEventListener avec les boutons ajoutés sur le nombre de places à réserver (pour rendre le côté plus intuitif pour l'utilisateur).

let btns = document.querySelectorAll(".btn");
let NombrePlaces = document.getElementById("NombrePlaces");

export default function changerNombrePlaces() {
  btns.forEach((btns) => {
    btns.addEventListener("click", function () {
      event.preventDefault();
      if (btns.classList.contains("decrease")) {
        if (NombrePlaces.value == 0) {
          NombrePlaces.value == 0;
        } else {
          NombrePlaces.value--;
        }
      } else if (btns.classList.contains("increase")) {
        NombrePlaces.value++;
      }
    });
    return NombrePlaces.value;
  });
}
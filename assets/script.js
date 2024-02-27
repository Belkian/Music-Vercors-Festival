import changerNombreFormulaire from "./changerNombreFormulaire.js";
import checkTarifReduit from "./checkTarifReduit.js";
import checkOptions from "./checkReservation.js";
// import changerNombreLuges from "./changerNombreLuges.js";
// import changerNombreCasques from "./changerNombreCasques.js";
import { checkTente, checkVan, checkEnfants } from "./Section-Options.js";

changerNombreFormulaire();
checkTarifReduit();
checkOptions();
// changerNombreLuges();
// changerNombreCasques();
checkTente();
checkVan();
checkEnfants();

let bouton = document.querySelectorAll(".bouton");
document.querySelector("#options").style.display = "none";
document.querySelector("#coordonnees").style.display = "none";
document.querySelector("#reservation").style.display = "block";

bouton.forEach((bouton) => {
  bouton.addEventListener("click", function () {
    // event.preventDefault();
    if (bouton.classList.contains("reservation")) {
      document.querySelector("#options").style.opacity = 0 + "%";
      setTimeout(() => {
        document.querySelector("#options").style.display = "none";
      }, 250);
      document.querySelector("#reservation").style.display = "block";
      setTimeout(() => {
        document.querySelector("#reservation").style.opacity = 75 + "%";
      }, 250);
      document.querySelector("#options").style.display = "none";
    }
    if (bouton.classList.contains("options")) {
      document.querySelector("#reservation").style.opacity = 0 + "%";
      setTimeout(() => {
        document.querySelector("#reservation").style.display = "none";
      }, 250);
      document.querySelector("#reservation").style.display = "block";
      document.querySelector("#options").style.display = "block";
      setTimeout(() => {
        document.querySelector("#options").style.opacity = 75 + "%";
      }, 250);
      document.querySelector("#coordonnees").style.display = "none";
    }
    if (bouton.classList.contains("coordonnees")) {
      document.querySelector("#options").style.opacity = 0 + "%";
      setTimeout(() => {
        document.querySelector("#options").style.display = "none";
      }, 250);
      document.querySelector("#options").style.display = "none";
      document.querySelector("#coordonnees").style.display = "block";
      setTimeout(() => {
        document.querySelector("#coordonnees").style.opacity = 75 + "%";
      }, 250);
      document.querySelector("#reservation").style.display = "none";
    }
  });
});

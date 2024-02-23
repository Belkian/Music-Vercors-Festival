export default function checkOptions() {
  // Affichage de la section des pass 1 journée au clic de "Pass 1 Jour"
  let pass1jour = document.getElementById("pass1jour");
  let pass1jourDate = document.getElementById("pass1jourDate");

  pass1jour.addEventListener("change", () => {
    if (pass1jour.checked == true) {
      pass1jourDate.style.visibility = "visible";
    } else {
      pass1jourDate.style.visibility = "hidden";
    }
  });

  let choixPass1Jour = document.querySelectorAll(".choixPass1Jour");
  let pass3jours = document.getElementById("pass3jours");
  let choixJour1 = document.getElementById("choixJour1");
  let choixJour2 = document.getElementById("choixJour2");
  let choixJour3 = document.getElementById("choixJour3");

  choixPass1Jour.forEach((choixPass1Jour) => {
    choixPass1Jour.addEventListener("change", () => {
      if (
        choixJour1.checked == true &&
        choixJour2.checked == true &&
        choixJour3.checked == true
      ) {
        pass3jours.checked = true;
        choixJour1.checked = false;
        choixJour2.checked = false;
        choixJour3.checked = false;
        pass1jour.checked = false;
        pass1jourDate.style.visibility = "hidden";
      }
    });
  });

  let pass2jours = document.getElementById("pass2jours");
  let pass2joursDate = document.getElementById("pass2joursDate");

  pass2jours.addEventListener("change", () => {
    if (pass2jours.checked == true) {
      pass2joursDate.style.visibility = "visible";
    } else {
      pass2joursDate.style.visibility = "hidden";
    }
  });

  let choixPass2Jours = document.querySelectorAll(".choixPass2Jours");
  let jour1et2 = document.querySelector(".jour1et2");
  let jour2et3 = document.querySelector(".jour2et3");

  choixPass2Jours.forEach((choixPass2Jours) => {
    choixPass2Jours.addEventListener("change", () => {
      console.log(choixJour12.checked);
      console.log(choixJour23.checked);

      if (jour1et2.checked) {
        jour1et2.checked = true;
        jour2et3.checked = false;
      }
      if (jour2et3.checked) {
        jour2et3.checked = true;
        jour1et2.checked = false;
      }
    });
  });
}

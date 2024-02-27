let btnEnfants = document.querySelectorAll(".btnEnfants");
let nombreCasquesEnfants = document.getElementById("nombreCasquesEnfants");

export default function changerNombreCasques() {
  btnEnfants.forEach((btnEnfants) => {
    btnEnfants.addEventListener("click", function () {
      if (btnEnfants.classList.contains("decreaseKids")) {
        if (nombreCasquesEnfants.value == 0) {
          nombreCasquesEnfants.value == 0;
        } else {
          nombreCasquesEnfants.value--;
        }
      } else if (btnEnfants.classList.contains("increaseKids")) {
        nombreCasquesEnfants.value++;
      }
    });
    return nombreCasquesEnfants.value;
  });
}

let btnLuges = document.querySelectorAll(".btnLuges");
let NombreLugesEte = document.getElementById("NombreLugesEte");

export default function changerNombreLuges() {
  btnLuges.forEach((btnLuges) => {
    btnLuges.addEventListener("click", function () {
      if (btnLuges.classList.contains("decreaseLuges")) {
        if (NombreLugesEte.value == 0) {
          NombreLugesEte.value == 0;
        } else {
          NombreLugesEte.value--;
        }
      } else if (btnLuges.classList.contains("increaseLuges")) {
        NombreLugesEte.value++;
      }
    });
    return NombreLugesEte.value;
  });
}

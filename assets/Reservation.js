let btns = document.querySelectorAll(".btn");
let NombrePlaces = document.getElementById("NombrePlaces");

function changerNombrePlaces() {
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



export default changerNombrePlaces;
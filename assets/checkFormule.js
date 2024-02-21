// Ajout d'une fonction pour le check des pass (si les 3 jours sont séléctionnés -> unchecked les pass 1 jour puis check pass 3 jours).

export default function checkPass() {
  let tenteNuit1 = document.querySelector("#tenteNuit1");
  let tenteNuit2 = document.querySelector("#tenteNuit2");
  let tenteNuit3 = document.querySelector("#tenteNuit3");
  let tente3Nuits = document.querySelector("#tente3Nuits");
  if (
    tenteNuit1.checked == true &&
    tenteNuit2.checked == true &&
    tenteNuit3.checked == true
  ) {
    tente3Nuits.checked = true;
    tenteNuit1.checked = false;
    tenteNuit2.checked = false;
    tenteNuit3.checked = false;
  }
  if (
    (tente3Nuits.checked == true && tenteNuit1.checked == true) ||
    tenteNuit2.checked == true ||
    tenteNuit3.checked == true
  ) {
    tente3Nuits.checked = false;
  }
}


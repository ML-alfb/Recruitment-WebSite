const competenceInput = document.getElementById("competence_input");
const addCompetenceBtn = document.getElementById("add_competence");
const competenceSection = document.querySelector(".competence_section");

const languageInput = document.getElementById("language_input");
const addLangugeBtn = document.getElementById("add_language");
const languegeSection = document.querySelector(".languege_section");
// const competencesInput = document.querySelectorAll(".data");
let competences = [];
const form = document.querySelector(".form");

let count = 0;
addCompetenceBtn.addEventListener("click", () => {
  const value = competenceInput.value;
  if (value.length > 0) {
    const INPUT = document.createElement("INPUT");
    INPUT.setAttribute("type", "hidden");
    INPUT.setAttribute("value", value);
    INPUT.setAttribute("name", "competences[]");
    INPUT.setAttribute("class", "hiddenCom");
    INPUT.setAttribute("data-id", count);

    const div = document.createElement("DIV");
    div.setAttribute("class", " chip");

    div.setAttribute("data-id", count);

    div.innerHTML = `<p>${value}</p><div class=''><i class="fa-regular fa-circle-xmark remove"></i></div>`;
    competenceSection.appendChild(div);
    competences = document.querySelectorAll(".remove");

    if (competences.length > 0) {
      competences.forEach((competence) => {
        console.log();
        if (competence.parentElement.parentElement.dataset.id == count)
          competence.addEventListener("click", removecompetence);
      });
    }
    if (value.length > 0) form.appendChild(INPUT);
    competenceInput.value = "";
    count += 1;
  }
});

function removecompetence(e) {
  competences.forEach((competence) => {
    if (
      e.target.parentElement.parentElement.dataset.id ==
      competence.parentElement.parentElement.dataset.id
    ) {
      competenceSection.removeChild(competence.parentElement.parentElement);
    }
  });
  const hiddenData = document.querySelectorAll(".hiddenCom");
  hiddenData.forEach((input) => {
    if (e.target.dataset.id == input.dataset.id) {
      form.removeChild(input);
    }
  });
}

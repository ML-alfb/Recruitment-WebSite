const modalBodyContainer = document.querySelector(".modal-body-container");
const competancesModal = document.querySelector(".competences");
let cometencesArray = [];
competancesModal.addEventListener("click", () => {
  getCompetance();
});

const getCompetance = () => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // console.log(xhr.responseText);
      cometencesArray = JSON.parse(xhr.responseText);
      addCompetenceModal(cometencesArray);
    }
  };

  xhr.open("GET", "/condidate/competence", true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
};

const addCompetenceModal = (cometencesArray) => {
  let liContent = "";
  cometencesArray.forEach((com) => {
    liContent += `<li class='show-competence flex' data-content="${com.competance_name}"><span>${com.competance_name}</span> <div class="u-d-icons flex">
    <div class='delete-icon' data-id="${com.competance_id}"><i class="fa-sharp fa-solid fa-trash f24"></i></div>
   <div class='update-icon' data-id=${com.competance_id}><i class="fa-regular fa-pen-to-square f24" ></i></div> </div></li>`;
  });

  modalBodyContainer.innerHTML = `<div class='remove-modal'></div><div class='modal'><div class='form-cart-content'><div class='header-section hide flex'><div class="header-title-section flex"><h2>Competance</h2><div><div  class='add-icon'><i class="fa-solid fa-plus f24"></i></div><div class='close-icon'><i class="fa-solid fa-xmark f24"></i></div></div></div><div class="modal-input-container  flex"><input class='modal-input' type="text" value=""  /><button class="btn modal-btn">add</button></div></div><div class='main-modal-content'><ul class='competences-ul'>${liContent}</ul></div></div></div>'`;

  // const modalInputContainer = document.querySelector(".modal-input-container");
  const headerSection = document.querySelector(".header-section");
  const updateComs = document.querySelectorAll(".update-icon");
  const modalInput = document.querySelector(".modal-input");
  const addIcon = document.querySelector(".add-icon");
  const removeIcon = document.querySelector(".close-icon");
  const ModalBtn = document.querySelector(".modal-btn");
  const deletComs = document.querySelectorAll(".delete-icon");
  const comUl = document.querySelector(".competences-ul");
  removeIcon.addEventListener("click", () => {
    removeIcon.parentElement.parentElement.parentElement.classList.add("hide");
    modalInput.value = "";
  });
  addIcon.addEventListener("click", () => {
    modalInput.setAttribute("name", "add");
    ModalBtn.innerHTML = "Add";
    addIcon.parentElement.parentElement.parentElement.classList.remove("hide");
    modalInput.focus();
  });
  updateComs.forEach((updateCom) => {
    updateCom.addEventListener("click", () => {
      modalInput.value = updateCom.parentElement.parentElement.dataset.content;
      ModalBtn.innerHTML = "Update";

      headerSection.classList.remove("hide");
      modalInput.focus();
      modalInput.setAttribute("name", "update");
      modalInput.setAttribute("data-id", updateCom.dataset.id);
    });
  });

  ModalBtn.addEventListener("click", () => {
    // console.log("aad");
    const comValue = modalInput.value;
    if (modalInput.name == "add") {
      updateAddCom(comValue, cometencesArray);
    } else {
      // console.log("zzzzzzzzz", modalInput.dataset);
      updateAddCom(comValue, cometencesArray, modalInput.dataset.id);
    }
  });

  deletComs.forEach((deletCom) => {
    deletCom.addEventListener("click", () => {
      if (deleteCom(deletCom?.dataset?.id)) {
        cometencesArray = cometencesArray.filter(
          (comp) => comp.competance_id != deletCom.dataset.id
        );

        deletCom.parentElement.parentElement.remove();
      }
    });
  });

  const removeModal = document.querySelector(".remove-modal");
  removeModal.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
};

const deleteCom = (id) => {
  const xhr = new XMLHttpRequest();

  xhr.open("DELETE", `/condidate/competence/${id}`, true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
  return (xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      return xhr.responseText;

      // const  = JSON.parse(xhr.responseText);
    }
  });
};

const updateAddCom = (comValue, cometencesArray, id = null) => {
  const xhr = new XMLHttpRequest();
  if (id) {
    xhr.open("PUT", `/condidate/competence/${id}`, true);
  } else {
    xhr.open("POST", `/condidate/competence`, true);
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.send(`competence_name=${comValue}`);
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const resultID = xhr.responseText;
      console.log(resultID);
      if (resultID) {
        if (!id) {
          cometencesArray = [
            ...cometencesArray,
            {
              competance_name: comValue,
              competance_id: parseInt(resultID),
            },
          ];
        } else {
          cometencesArray = cometencesArray.map((com) => {
            if (com.competance_id == id) {
              return {
                competance_name: comValue,
                competance_id: parseInt(resultID),
              };
            }
            return com;
          });
        }
        addCompetenceModal(cometencesArray);
      }
    }
  };
};
// ############################################################
// ######################## formation #########################

const formations = document.querySelector(".formations");
let formationsArray = [];
formations.addEventListener("click", () => {
  getFormations();
});

const getFormations = () => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // console.log(xhr.responseText);
      // addCompetenceModal(cometencesArray);
      formationsArray = JSON.parse(xhr.responseText);
      // console.log(formationsArray);
      addFormationModal(formationsArray);
    }
  };

  xhr.open("GET", "/condidate/formation", true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
};

const addFormationModal = (formationsArray) => {
  modalBodyContainer.innerHTML = modalHtml(formationsArray);

  const deleteFormationBtns = document.querySelectorAll(".delete-icon");
  deleteFormationBtns.forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", () => {
      const formationId = deleteBtn.parentElement.parentElement.dataset.id;
      deleteFormation(formationId, deleteBtn);
    });
  });

  const addFormationBtn = document.querySelector(".add-mark-fomration-form");
  addFormationBtn.addEventListener("click", () => {
    modalBodyContainer.children[1].innerHTML += formationFormHtml();
    const submitBtn = document.querySelector("#submit");
    submitBtn.addEventListener("click", () => {
      const formationValues = getFormValues();
      if (formationValues) {
        AddFormation(formationValues, formationsArray);
      }
    });

    //addformation on click
    closeForm();
  });

  const updateFormationBtns = document.querySelectorAll(".update-icon");
  updateFormationBtns.forEach((updateFormationBtn) => {
    updateFormationBtn.addEventListener("click", () => {
      const formationId =
        updateFormationBtn.parentElement.parentElement.dataset.id;
      const objFormation = formationsArray.find(
        (f) => f.formation_id == formationId
      );
      modalBodyContainer.children[1].innerHTML +=
        formationFormHtml(objFormation);
      //updateFormation on click
      const submitBtn = document.querySelector("#submit");
      submitBtn.addEventListener("click", () => {
        const formaionIdToUpdate = submitBtn.dataset.id;
        const formationValues = getFormValues();
        if (formationValues) {
          updateFormation(formationValues, formationsArray, formaionIdToUpdate);
        }
      });
      closeForm();
    });
  });

  const removeModalIcon = document.querySelector(".close-mark-fomration-form");
  const removeModal = document.querySelector(".remove-modal");
  removeModalIcon.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
  removeModal.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
};

const modalHtml = (formationArray) => {
  const formationContent = liFormationHtml(formationArray);
  return `<div class='remove-modal'></div>
<div class="modal">

  <div class="formation-modal-content">
      <div class="formation-header-section flex">
      <div class="close-mark-container"> <div  class='close-mark-fomration-form'>
      <i class="fa-solid fa-xmark f27"></i>
    </div></div>
        <div class="header-title-section flex">
                <h2>Formation</h2>
                <div  class='add-mark-fomration-form'>
                  <i class="fa-solid fa-plus f27"></i>
                </div>
        </div>
      </div>
      <div class="main-modal-content">
        <ul>
         ${formationContent}
          </ul>
      </div>
    </div>
</div> `;
};

const liFormationHtml = (formationArray) => {
  let formationContent = "";
  formationArray.forEach((f) => {
    formationContent += ` <li class="show-competence flex" data-id='${f.formation_id}'> 
    <div class="formation-info">
        <span>${f.formation_ecole}</span> 
      <p>${f.formation_deplome},${f.formation_domene}</p>
    </div> 
  <div class="u-d-icons flex">
    <div class='delete-icon'><i class="fa-sharp fa-solid fa-trash f24"></i></div>
  <div class='update-icon' ><i class="fa-regular fa-pen-to-square f24" ></i></div>
  </div>
  </li>`;
  });
  return formationContent;
};

const formationFormHtml = (
  objFormation = {
    formation_ecole: "",
    formation_domene: "",
    formation_deplome: "",
    formation_id: 0,
    formation_startedAt: "",
    formation_endedAt: "",
  }
) => {
  const d = new Date();
  let year = d.getFullYear();
  let SyearOptions = "";
  let EyearOptions = "";
  console.log(objFormation);
  const Syear =
    objFormation?.formation_startedAt != ""
      ? objFormation?.formation_startedAt.split("-")[0]
      : 0;
  const Eyear =
    objFormation?.formation_endedAt != ""
      ? objFormation?.formation_endedAt.split("-")[0]
      : 0;
  for (let i = year; i > year - 12; i--) {
    if (Number(Syear) == i) {
      SyearOptions += `<option  value='${i}' selected >${i}</option>`;
    } else {
      SyearOptions += `<option  value='${i}'>${i}</option>`;
    }
  }
  for (let i = year; i > year - 12; i--) {
    if (Eyear == i) {
      EyearOptions += `<option  value='${i}' selected >${i}</option>`;
    } else {
      EyearOptions += `<option value='${i}'>${i}</option>`;
    }
  }
  const Smounth =
    objFormation?.formation_startedAt != ""
      ? objFormation?.formation_startedAt.split("-")[1]
      : 0;
  const Emounth =
    objFormation?.formation_endedAt != ""
      ? objFormation?.formation_endedAt.split("-")[1]
      : 0;
  let Smounths = "";
  let Emounths = "";
  [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ].forEach((mounth, index) => {
    if (index == Smounth) {
      Smounths += `<option value="${index}" selected >${mounth}</option>`;
    }
    Smounths += `<option value="${index}">${mounth}</option>`;
  });
  [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ].forEach((mounth, index) => {
    if (index == Emounth) {
      Emounths += `<option value="${index}" selected >${mounth}</option>`;
    }
    Emounths += `<option value="${index}">${mounth}</option>`;
  });
  return `<div class="formation-form-content ">
  <div class="formation-header">
    <h2>Add Formation </h2>
    <div  class='close-mark-form'><i class="fa-solid fa-xmark f27"></i></div>
  </div>
  <div class="formation-form-input-container">
    <label class="label" for="schoolName">shool</label>
     <input type="text" id="schoolName" value='${objFormation?.formation_ecole}' placeholder="School Name"  >
  </div>
  <div class="formation-form-input-container ">
    <label  class="label" for="field">Field</label>
     <input type="text" id="field" value='${objFormation?.formation_domene}' placeholder="Field" required >
  </div>
  <div class="formation-form-input-container ">
    <label class="label" for="degree">Degree</label>
     <input type="text" id="degree" value='${objFormation?.formation_deplome}' placeholder="Degree" required >
  </div>
  <div class="formation-date-contianer">
    <div class="label">
    <span >Start Date</span>
    </div> 
  <div class="formation-form-selects-container">
  
    <select  class="select select-date-start" >
    <option value="">Month</option>
    ${Smounths}
    </select>
    <select class="select select-year-start" >
    <option value=" ">Year</option>   
    ${SyearOptions}
    </select>
  

    </div>
  </div>
  <div class="formation-date-contianer">
    <div class="label">
    <span >End Date</span>
    </div> 
  <div class="formation-form-selects-container">
  
    <select class="select select-date-end" >
    <option value="">Month</option>
    ${Emounths}
    </select>
    <select class="select select-year-end" >
    <option value="1">Year</option>
    ${EyearOptions}
    </select>
    </div>
  </div>
  
 <div class="formation-form-btn-container">
  <button class="btn" id='submit' data-id='${objFormation.formation_id}'>Register</button>
 </div>
</div>`;
};

const getFormValues = () => {
  const shoolInputValue = document.querySelector("#schoolName").value;
  const domeneInputValue = document.querySelector("#field").value;
  const deplomeInputValue = document.querySelector("#degree").value;
  const startDateSelectValue =
    document.querySelector(".select-date-start").value;
  const endDateSelectValue = document.querySelector(".select-date-end").value;
  const startYearSelectValue =
    document.querySelector(".select-year-start").value;
  const endYearSelectValue = document.querySelector(".select-year-end").value;
  if (
    shoolInputValue == "" ||
    domeneInputValue == "" ||
    deplomeInputValue == "" ||
    startDateSelectValue == "" ||
    endDateSelectValue == "" ||
    startYearSelectValue == "" ||
    endYearSelectValue == ""
  ) {
    return false;
  }
  const endDate = `${endYearSelectValue}-${endDateSelectValue}-1`;
  const startDate = `${startYearSelectValue}-${startDateSelectValue}-1`;
  // console.log(endDate, startDate);
  return {
    ecole: shoolInputValue,
    endDate,
    startDate,
    deplome: deplomeInputValue,
    domene: domeneInputValue,
  };
};

const closeForm = () => {
  const closeFormBtn = document.querySelector(".close-mark-form");
  closeFormBtn.addEventListener("click", () => {
    closeFormBtn.parentElement.parentElement.remove();
    addFormationModal(formationsArray);
  });
};
const AddFormation = (f, formationArray) => {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", `/condidate/formation`, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.send(
    `formation_ecole=${f.ecole}&formation_deplome=${f.deplome}&formation_domene=${f.domene}&formation_startedAt=${f.startDate}&formation_endedAt=${f.endDate}`
  );
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const formationID = xhr.responseText;
      if (formationID) {
        formationArray = [
          ...formationArray,
          {
            formation_deplome: f.deplome,
            formation_domene: f.domene,
            formation_ecole: f.ecole,
            formation_endedAt: f.endDate,
            formation_id: formationID,
            formation_startedAt: f.startDate,
            user_id: formationArray[0]?.user_id ? formationArray[0].user_id : 1,
          },
        ];
        addFormationModal(formationArray);
      }
    }
  };
};
const updateFormation = (f, formationArray, formaionIdToUpdate) => {
  const xhr = new XMLHttpRequest();

  xhr.open("PUT", `/condidate/formation/${formaionIdToUpdate}`, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.send(
    `formation_ecole=${f.ecole}&formation_deplome=${f.deplome}&formation_domene=${f.domene}&formation_startedAt=${f.startDate}&formation_endedAt=${f.endDate}`
  );
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const formationIsUpdated = xhr.responseText;
      if (formationIsUpdated) {
        formationArray = formationArray.map((formation) => {
          if (formation.formation_id == formaionIdToUpdate) {
            return {
              formation_deplome: f.deplome,
              formation_domene: f.domene,
              formation_ecole: f.ecole,
              formation_endedAt: f.endDate,
              formation_id: formaionIdToUpdate,
              formation_startedAt: f.startDate,
              user_id: formationArray[0].user_id,
            };
          }
          return formation;
        });
        addFormationModal(formationArray);
      }
    }
  };
};
const deleteFormation = (id, deleteBtn) => {
  const xhr = new XMLHttpRequest();

  xhr.open("DELETE", `/condidate/formation/${id}`, true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const result = xhr.responseText;
      // console.log(result);
      if (result) {
        formationsArray = formationsArray.filter((f) => f.formation_id != id);
        deleteBtn.parentElement.parentElement.remove();
      } else {
        //do something
      }

      // const  = JSON.parse(xhr.responseText);
    }
  };
};

// ##################################################################
// ######################        CV       ###########################
const CV = document.querySelector(".cv");

CV.addEventListener("click", () => {
  getCV();
});

const addCVModal = (cv = null) => {
  modalBodyContainer.innerHTML = cv
    ? modalCVHtml(fileModal(cv))
    : modalCVHtml();
  const fileInput = document.querySelector("#file");
  const fileContianer = document.querySelector(".file-contianer");
  fileInput.addEventListener("change", () => {
    if (fileInput.files.length) {
      if (fileInput.files[0].name.split(".")[1] == "pdf") {
        fileContianer.innerHTML = fileModal(fileInput.files[0].name);
      }
    }
  });

  const droparea = document.querySelector(".droparea");
  const active = () => droparea.classList.add("opacity-7");
  const inactive = () => droparea.classList.remove("opacity-7");
  const prevents = (e) => e.preventDefault();
  ["dragenter", "dragover", "dragleave", "drop"].forEach((evtName) => {
    droparea.addEventListener(evtName, prevents);
  });
  ["dragenter", "dragover"].forEach((evtName) => {
    droparea.addEventListener(evtName, active);
  });
  ["dragleave", "drop"].forEach((evtName) => {
    droparea.addEventListener(evtName, inactive);
  });
  droparea.addEventListener("drop", handleDrop);

  const removeModal = document.querySelector(".remove-modal");
  removeModal.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
};
const getCV = () => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const cv = xhr.responseText != 0 ? JSON.parse(xhr.responseText) : null;
      if (cv) {
        if (cv.cv_saved_name && cv.condidat_CV) {
          const cvhtml = `<a href="/condidate/CV?filepath=${cv.cv_saved_name}">${cv.condidat_CV}</a>`;
          addCVModal(cvhtml);
        } else {
          addCVModal();
        }
      }
    }
  };
  xhr.open("GET", "/condidate/CV", true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
};

const handleDrop = (e) => {
  const dt = e.dataTransfer;
  const files = dt.files;

  const fileContianer = document.querySelector(".file-contianer");

  const fileInput = document.querySelector("#file");
  if (files.length) {
    if (files[0].name.split(".")[1] == "pdf") {
      fileContianer.innerHTML = fileModal(files[0].name);
      fileInput.files = files;
    }
  }
};
const modalCVHtml = (cvhtml = null) => {
  return `<div class='remove-modal'></div>
    <div class="cv-modal-content droparea ">
    <div class="file-contianer">
    ${
      cvhtml
        ? cvhtml
        : '<div class="image-container"><div><i class="fa-solid fa-file-image f40"></i></div><p> Drop your .pdf file </p> </div><div class="input-container"><label for="file" class="fileInput-btn" >add file</label> </div>'
    }
    </div>
    <div class="file-btn-container w-100 flex">
    <form class=''  action='/condidate/CV' method='POST' enctype="multipart/form-data"> 
    <input type='file' id='file' name='fileInput' required class='fileInput' />
    <button class='btn' name='submit' value='save'>save</button> 
    </form>
    </div>
  
   
  </div> `;
};
const fileModal = (name) => {
  return `<div class="file flex ">
  <div class='pdf-img'  ></div>
  <div class='file-h3'><h3>${name}</h3></div>
  <div class='file-actions'><i class="fa-solid fa-ellipsis-vertical f27"></i></div>
  </div><div class="input-container">
  <label for='file' class='fileInput-btn' >update file</label> 
  
  </div>`;
};

// ##################################################################
// ######################     expireice   ###########################
// experiences
const experiences = document.querySelector(".experiences");
let experiencesArray = [];
experiences.addEventListener("click", () => {
  getExperiences();
  // addExperiencesModal(experiencesArray);
});

const getExperiences = () => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // console.log(xhr.responseText);
      // addCompetenceModal(cometencesArray);
      experiencesArray = JSON.parse(xhr.responseText);
      // console.log(experiencesArray);
      addExperiencesModal(experiencesArray);
    }
  };

  xhr.open("GET", "/condidate/experience", true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
};

const addExperiencesModal = (experiencesArray) => {
  console.log(experiencesArray, "hfddddddddddddd");
  modalBodyContainer.innerHTML = experieceModalHtml(experiencesArray);

  const deleteExperienceBtns = document.querySelectorAll(".delete-icon");
  deleteExperienceBtns.forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", () => {
      const ExperienceId = deleteBtn.parentElement.parentElement.dataset.id;
      deleteExperience(ExperienceId, deleteBtn);
    });
  });

  const addExpirenceBtn = document.querySelector(".add-mark-fomration-form");
  addExpirenceBtn.addEventListener("click", () => {
    modalBodyContainer.children[1].innerHTML += experienceFormHtml();
    const submitBtn = document.querySelector("#submit");
    submitBtn.addEventListener("click", () => {
      const experiecneValues = getExpirenceFormValues();
      // console.log(experiecneValues);
      if (experiecneValues) {
        addExpereince(experiecneValues, experiencesArray);
      }
    });

    //addformation on click
    closeExpirienceForm();
  });

  const updateExpirencBtns = document.querySelectorAll(".update-icon");
  updateExpirencBtns.forEach((updateExpirencBtn) => {
    updateExpirencBtn.addEventListener("click", () => {
      const ExpirenceId =
        updateExpirencBtn.parentElement.parentElement.dataset.id;
      const objExpirence = experiencesArray.find(
        (exp) => exp.id == ExpirenceId
      );
      modalBodyContainer.children[1].innerHTML +=
        experienceFormHtml(objExpirence);
      //updateFormation on click
      const submitBtn = document.querySelector("#submit");
      submitBtn.addEventListener("click", () => {
        const experienceIdToUpdate = submitBtn.dataset.id;
        const ExpirenceValues = getExpirenceFormValues();
        console.log("gcghcgc", ExpirenceValues);
        if (ExpirenceValues) {
          updateExperience(
            ExpirenceValues,
            experiencesArray,
            experienceIdToUpdate
          );
        }
      });
      closeExpirienceForm();
    });
  });

  const removeModalIcon = document.querySelector(".close-mark-fomration-form");
  const removeModal = document.querySelector(".remove-modal");
  removeModalIcon.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
  removeModal.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
};

const experieceModalHtml = (experiencesArray) => {
  const experienceContent = liExperienceHtml(experiencesArray);
  // console.log(experienceContent);
  return `<div class='remove-modal'></div>
<div class="modal">
  <div class="formation-modal-content">
      <div class="formation-header-section flex">
      <div class="close-mark-container"> <div  class='close-mark-fomration-form'>
      <i class="fa-solid fa-xmark f27"></i>
    </div></div>
        <div class="header-title-section flex">
                <h2>Experience</h2>
                <div class='add-mark-fomration-form'>
                  <i class="fa-solid fa-plus f27"></i>
                </div>
        </div>
      </div>
      <div class="main-modal-content">
        <ul>
         ${experienceContent}
          </ul>
      </div>
    </div>
</div> `;
};

const liExperienceHtml = (experiencesArray) => {
  // console.log(experiencesArray, "aaaaaaaaaaaaaaaaaaa");
  let experienceContent = "";
  experiencesArray?.forEach((exp) => {
    experienceContent += `
       <li class="show-competence flex" data-id='${exp.id}'>
      <div class="formation-info">
          <span>${exp.company_name}</span>
        <p>${exp.activity_area},${exp.role}</p>
      </div>
    <div class="u-d-icons flex">
      <div class='delete-icon'><i class="fa-sharp fa-solid fa-trash f24"></i></div>
    <div class='update-icon' ><i class="fa-regular fa-pen-to-square f24" ></i></div>
    </div>
    </li>
    `;
  });

  return experienceContent;
};

const experienceFormHtml = (
  objExperience = {
    company_name: "",
    activity_area: "",
    role: "",
    start_date: "",
    id: 0,
    end_date: "",
  }
) => {
  const d = new Date();
  let year = d.getFullYear();
  let SyearOptions = "";
  let EyearOptions = "";
  const Syear =
    objExperience?.start_date != ""
      ? objExperience?.start_date.split("-")[0]
      : 0;
  const Eyear =
    objExperience?.end_date != "" ? objExperience?.end_date.split("-")[0] : 0;
  for (let i = year; i > year - 12; i--) {
    if (Number(Syear) == i) {
      SyearOptions += `<option  value='${i}' selected >${i}</option>`;
    } else {
      SyearOptions += `<option  value='${i}'>${i}</option>`;
    }
  }
  for (let i = year; i > year - 12; i--) {
    if (Eyear == i) {
      EyearOptions += `<option  value='${i}' selected >${i}</option>`;
    } else {
      EyearOptions += `<option value='${i}'>${i}</option>`;
    }
  }
  const Smounth =
    objExperience?.start_date != ""
      ? objExperience?.start_date.split("-")[1]
      : 0;
  const Emounth =
    objExperience?.end_date != "" ? objExperience?.end_date.split("-")[1] : 0;
  let Smounths = "";
  let Emounths = "";
  [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ].forEach((mounth, index) => {
    if (index == Smounth) {
      Smounths += `<option value="${index}" selected >${mounth}</option>`;
    }
    Smounths += `<option value="${index}">${mounth}</option>`;
  });
  [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ].forEach((mounth, index) => {
    if (index == Emounth) {
      Emounths += `<option value="${index}" selected >${mounth}</option>`;
    }
    Emounths += `<option value="${index}">${mounth}</option>`;
  });

  return `<div class="formation-form-content ">
  <div class="formation-header">
    <h2>Add Exprience </h2>
    <div  class='close-mark-form'><i class="fa-solid fa-xmark f27"></i></div>
  </div>
  <div class="formation-form-input-container">
    <label class="label" for="Company">shool</label>
     <input type="text" id="Company" value='${objExperience?.company_name}' placeholder="Company name"  >
  </div>
  <div class="formation-form-input-container ">
    <label  class="label" for="activity_area">activity area</label>
     <input type="text" id="activity_area" value='${objExperience?.activity_area}' placeholder="activity area" required >
  </div>
  <div class="formation-form-input-container ">
    <label class="label" for="Role">Role</label>
     <input type="text" id="Role" value='${objExperience?.role}' placeholder="Role" required >
  </div>
  <div class="formation-date-contianer">
    <div class="label">
    <span >Start Date</span>
    </div> 
  <div class="formation-form-selects-container">
    <select  class="select select-date-start" >
    <option value="">Month</option>
   ${Smounths}
    </select>
    <select class="select select-year-start" >
    <option value="1">Year</option>   
    ${SyearOptions}
    </select>
  

    </div>
  </div>
  <div class="formation-date-contianer">
    <div class="label">
    <span >End Date</span>
    </div> 
  <div class="formation-form-selects-container">
  
    <select class="select select-date-end" >
    <option value="">Month</option>
    <option value="1">January</option>
  ${Emounths}
    </select>
    <select class="select select-year-end" >
    <option value="1">Year</option>
    ${EyearOptions}
    </select>
    </div>
  </div>
  
 <div class="formation-form-btn-container">
  <button class="btn" id='submit' data-id='${objExperience?.id}'>Register</button>
 </div>
</div>`;
};

const getExpirenceFormValues = () => {
  const CompanyInputValue = document.querySelector("#Company").value;
  const activityAreaInputValue = document.querySelector("#activity_area").value;
  const roleInputValue = document.querySelector("#Role").value;
  const startDateSelectValue =
    document.querySelector(".select-date-start").value;
  const endDateSelectValue = document.querySelector(".select-date-end").value;
  const startYearSelectValue =
    document.querySelector(".select-year-start").value;
  const endYearSelectValue = document.querySelector(".select-year-end").value;
  if (
    CompanyInputValue == "" ||
    activityAreaInputValue == "" ||
    roleInputValue == "" ||
    startDateSelectValue == "" ||
    endDateSelectValue == "" ||
    startYearSelectValue == "" ||
    endYearSelectValue == ""
  ) {
    return false;
  }
  const endDate = `${endYearSelectValue}-${endDateSelectValue}-1`;
  const startDate = `${startYearSelectValue}-${startDateSelectValue}-1`;
  console.log(activityAreaInputValue);
  return {
    company_name: CompanyInputValue,
    end_date: endDate,
    start_date: startDate,
    activity_area: activityAreaInputValue,
    role: roleInputValue,
  };
};

const closeExpirienceForm = () => {
  const closeFormBtn = document.querySelector(".close-mark-form");
  closeFormBtn.addEventListener("click", () => {
    closeFormBtn.parentElement.parentElement.remove();
    console.log(experiencesArray);
    addExperiencesModal(experiencesArray);
  });
};
const addExpereince = (exp, experiencesArray) => {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", `/condidate/experience`, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.send(
    `company_name=${exp.company_name}&activity_area=${exp.activity_area}&role=${exp.role}&start_date=${exp.start_date}&end_date=${exp.end_date}`
  );
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const exprienceID = xhr.responseText;
      console.log(exprienceID);
      if (exprienceID) {
        experiencesArray = [
          ...experiencesArray,
          {
            company_name: exp.company_name,
            activity_area: exp.activity_area,
            role: exp.role,
            start_date: exp.startDate,
            id: exprienceID,
            end_date: exp.endDate,
            user_id: experiencesArray[0]?.user_id
              ? experiencesArray[0].user_id
              : 1,
          },
        ];
        addExperiencesModal(experiencesArray);
      }
    }
  };
};
const updateExperience = (exp, experiencesArray, experienceIdToUpdate) => {
  const xhr = new XMLHttpRequest();

  xhr.open("PUT", `/condidate/experience/${experienceIdToUpdate}`, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.send(
    `company_name=${exp.company_name}&activity_area=${exp.activity_area}&role=${exp.role}&start_date=${exp.start_date}&end_date=${exp.end_date}`
  );
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const experienceIsUpdated = xhr.responseText;
      if (experienceIsUpdated) {
        experiencesArray = experiencesArray.map((f) => {
          if (f.id == experienceIdToUpdate) {
            return {
              company_name: exp.company_name,
              activity_area: exp.activity_area,
              role: exp.role,
              start_date: exp.start_date,
              id: experienceIdToUpdate,
              end_date: exp.end_date,
              user_id: experiencesArray[0].user_id,
            };
          }
          return f;
        });
        addExperiencesModal(experiencesArray);
      }
    }
  };
};

const deleteExperience = (id, deleteBtn) => {
  const xhr = new XMLHttpRequest();
  xhr.open("DELETE", `/condidate/experience/${id}`, true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const result = xhr.responseText;
      // console.log(result);
      if (result == 1) {
        experiencesArray = experiencesArray.filter((f) => f.id != id);
        deleteBtn.parentElement.parentElement.remove();
      } else {
        //do something
      }
    }
  };
};
// ##################################################################
// ######################     favorites   ###########################
const favoriteBtns = document.querySelectorAll(".favorites-btn");

favoriteBtns.forEach((favoriteBtn) => {
  favoriteBtn.addEventListener("click", () => {
    const favoriteOfferId = favoriteBtn.dataset.id;
    favoriteBtn.classList.toggle("save");
    let x = Cookies.get("favoriteOffersId")
      ? JSON.parse(Cookies.get("favoriteOffersId"))
      : [];

    if (x) {
      if (x.includes(favoriteOfferId)) {
        x = x.filter((m) => m != favoriteOfferId);
      } else {
        x = [...x, favoriteOfferId];
      }

      Cookies.set("favoriteOffersId", JSON.stringify(x), { expires: 1 });
    } else {
      x[0] = favoriteOfferId;

      Cookies.set("favoriteOffersId", JSON.stringify(x), { expires: 1 });
    }
    console.log(x);
  });
});

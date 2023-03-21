const fileInput = document.querySelector(".fileInput");
const modalBodyContainer = document.querySelector(".modal-body-container");
fileInput.addEventListener("change", () => {
  if (fileInput.files.length) {
    const exPos = fileInput.files[0].name.split(".").length - 1;
    console.log(fileInput.files[0].name.split(".")[exPos].toLowerCase());
    if (
      fileInput.files[0].name.split(".")[exPos].toLowerCase() == "png" ||
      fileInput.files[0].name.split(".")[exPos].toLowerCase() == "jpg" ||
      fileInput.files[0].name.split(".")[exPos].toLowerCase() == "jpeg"
    ) {
      //   console.log("5444");
      //   console.log(URL.createObjectURL(fileInput.files[0]));
      modalBodyContainer.innerHTML = fileModal(fileInput.dataset.id);
      const imgInput = document.querySelector(".imageInput");
      imgInput.files = fileInput.files;
      readURL(fileInput.files[0]);
    }
  }
  const removeModal = document.querySelector(".remove-modal");
  removeModal.addEventListener("click", () => {
    modalBodyContainer.innerHTML = "";
  });
});
const fileModal = (id) => {
  return `<div class='remove-modal'></div>
  <div class="modal ">
  <div class="profile-image-form-container flex">
           
            <div class="image-contianer">
            <img class='profile-image profile-img' scr="" />
            </div>
           <form method="POST" action="/condidate/profile/${id}"  enctype="multipart/form-data">
           <input  class="imageInput" name="image" type="file"/>
            <button class="btn" name="save" value="upload">
               Save Image
            </button>
           </form>
           </div>
           </div>`;
};

function readURL(file) {
  let reader = new FileReader();

  reader.onload = function (e) {
    document
      .querySelector(".profile-image")
      .setAttribute("src", e.target.result);
  };

  reader.readAsDataURL(file);
}

// const getImg = (id) => {
//   const xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = () => {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       // const image = xhr.responseText != 0 ? JSON.parse(xhr.responseText) : null;
//       console.log(xhr.responseText);
//       // readURL(xhr.responseTexts);
//     }
//   };
//   xhr.open("GET", `/condidate/profile/${id}`, true);
//   xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
//   xhr.send();
// };
// getImg(21);

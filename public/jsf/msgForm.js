const sendMsgBtn = document.querySelector(".send-msg-btn");
const msgForm = document.querySelector(".add-msg-form-continer");
sendMsgBtn.addEventListener("click", () => {
  msgForm.parentElement.classList.add("visible-form");
  const removeFormBtn = document.querySelector(".close-form");
  removeFormBtn.addEventListener("click", () => {
    msgForm.parentElement.classList.remove("visible-form");
  });
});

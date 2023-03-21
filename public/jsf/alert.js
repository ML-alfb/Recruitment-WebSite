const error = document.querySelector(".error-msg");
if (error) {
  setTimeout(() => {
    error.parentElement.removeChild(error);
  }, 3000);
}
const success = document.querySelector(".success-msg");
if (success) {
  setTimeout(() => {
    success.parentElement.removeChild(success);
  }, 3000);
}

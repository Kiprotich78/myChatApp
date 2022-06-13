const form = document.querySelector(".signup form");
const submitSignUp = form.querySelector(".button-sign-up");
const outputMessage = document.querySelector("h1");

form.onsubmit = function (e) {
  e.preventDefault();
};

submitSignUp.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "/myChatApp/php/signUp.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let response = xhr.responseText;
      if (response === "success") {
        location.href = "/myChatApp/html-php/users.php";
      } else {
        outputMessage.textContent = response;
        outputMessage.style.backgroundColor = "#cc3300 !important";
      }
    }
  };
  const formData = new FormData(form);
  xhr.send(formData);
});

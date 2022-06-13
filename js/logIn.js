const form2 = document.querySelector(".login form");
const submitLogIn = form2.querySelector(".button-log-in");

form2.onsubmit = function (event) {
  event.preventDefault();
};

submitLogIn.addEventListener("click", function () {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "/myChatApp/php/logIn.php", true);
  xhr.onload = function () {
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

  const formData = new FormData(form2);
  xhr.send(formData);
});

const form2 = document.querySelector(".login form");
const submitLogIn = form2.querySelector(".button-log-in");
const errorMsg = document.querySelectorAll("h1");
console.log(errorMsg);
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
        errorMsg[1].textContent = response;
        errorMsg[1].style.background = '#cc3300';
      }
    }
  };

  const formData = new FormData(form2);
  xhr.send(formData);
});

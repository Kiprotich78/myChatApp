const form2 = document.querySelector(".login form");
const submitLogIn = form2.querySelector(".button-log-in");

form2.onsubmitt = function (event) {
  event.preventDefault();
};

submitLogIn.addEventListener("click", function () {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "/myChatApp/php/logIn.php", true);
  xhr.onload = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let response = xhr.responseText;
      console.log(response);
    }
  };


  const formData = new FormData(form2);
  xhr.send(formData);
});

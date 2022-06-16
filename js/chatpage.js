const input = document.querySelector("input");
const form = document.querySelector("form");
const clicked = form.querySelector("button");
const chatSection = document.querySelector(".chatSection");
const chatPageheader = document.querySelector(".header");

setWholePage();
function setWholePage() {
  setInputValue();
  setUserStatus();
}
setInterval(setHeaderAjax, 1000);
function setHeaderAjax() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/myChatApp/php/configChatPageHeader.php", true);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const response = this.responseText;
      chatPageheader.innerHTML = response;
    }
  };
  xhr.send();
}

function setInputValue() {
  input.addEventListener("keyup", () => {
    if (input.value.length > 0) {
      clicked.style.pointerEvents = "auto";
    } else {
      clicked.style.pointerEvents = "none";
    }
  });

  input.addEventListener("keydown", (e) => {
    if (input.value !== "" && e.keyCode === 13) {
      rendermessage();
    }
  });

  clicked.addEventListener("click", () => {
    rendermessage();
  });
}

function rendermessage() {
  getAjax();
  input.value = "";
  clicked.style.pointerEvents = "none";
}

const formatTime = (hours, minutes) => {
  if (hours < 10) {
    hours = "0" + hours;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  return hours + ":" + minutes;
};

function logOut() {
  const logOutBtn = document.querySelector(".logOut");
  logOutBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/myChatApp/php/logOut.php", true);
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "/myChatApp/html-php/signUpLogIn.php";
        console.log(this.responseText);
      }
    };
    xhr.send();
  });
}

setTimeout(logOut, 5000);

function setUserStatus() {
  document.addEventListener("visibilitychange", () => {
    documentVisible();
    if (document.visibilityState != "visible") {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "/myChatApp/php/setUserStatus.php?status=offline", true);
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      xhr.send();
    }
  });
  window.addEventListener(
    "beforeunload",
    () => {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "/myChatApp/php/setUserStatus.php?status=offline", true);
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      xhr.send();
    },
    false
  );
}

function documentVisible() {
  if (document.visibilityState == "visible") {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/myChatApp/php/setUserStatus.php?status=online", true);
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhr.send();
  }
}
documentVisible();

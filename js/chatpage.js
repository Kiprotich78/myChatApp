const input = document.querySelector("input");
const form = document.querySelector("form");
const clicked = form.querySelector("button");
const chatSection = document.querySelector(".chatSection");
const chatPageheader = document.querySelector(".header");
let count = 0;
setWholePage();
function setWholePage() {
  setInputValue();
  setUserStatus();
  documentVisible();
  setUserTyping();
  setHeaderAjax();
}
setTimeout(goPrevious, 2000);
function goPrevious() {
  const goBack = document.querySelector(".left_icon");
  goBack.addEventListener("click", () => {
    location.href = "/myChatApp/html-php/users.php";
    console.log("go back");
  });
}

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

input.addEventListener("keydown", (e) => {
  if (input.value !== "" && e.keyCode === 13) {
    rendermessage();
  }
});

function setInputValue() {
  input.addEventListener("keyup", () => {
    if (input.value.length > 0) {
      clicked.style.pointerEvents = "auto";
    } else {
      clicked.style.pointerEvents = "none";
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
        window.location.href = "/myChatApp/html-php/index.php";
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
let counting;
function setUserTyping() {
  input.addEventListener("keyup", (e) => {
    count = 0;
    clearInterval(counting);
    if (e.keyCode != 13) {
      let xhr = new XMLHttpRequest();

      counting = setInterval(() => {
        if (count == 5) {
          deleteTyping();
          clearInterval(counting);
        }
        console.log(count);
        count++;
      }, 1000);

      xhr.open("POST", "/myChatApp/php/setUserTyping.php", true);
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      const status = "typing...";
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(`status=${status}`);
    }
    
  });
}

function deleteTyping() {
  console.log("count = ", count);
  count = 0;
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/myChatApp/php/deleteTyping.php", true);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhr.send();
}

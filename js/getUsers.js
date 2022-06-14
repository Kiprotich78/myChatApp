const allUsers = document.querySelector(".allUsers");
const myProfile = document.querySelector(".myprofile");
const search = document.querySelector("input");
setUsersPage();

function setUsersPage() {
  setUsersHeaderAjax();
  setUsersBodyAjax();
  searchUsers();
}

function setUsersHeaderAjax() {
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", "/myChatApp/php/getProfile.php", true);
  xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
      const response = xmlHttp.responseText;
      myProfile.innerHTML = response;
    }
  };
  xmlHttp.send();
}

function searchUsers() {
  search.addEventListener("keyup", () => {
    const xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "/myChatApp/php/search.php?search=" + search.value, true);
    xhr2.onreadystatechange = function () {
      if (xhr2.readyState == 4 && xhr2.status == 200) {
        const response = xhr2.responseText;
        if (search.value != "") {
          search.classList.add("isActive");
          allUsers.innerHTML = response;
        }
        else {
          search.classList.remove("isActive");
          setUsersBodyAjax();
        } 
      }
    };
    xhr2.send();
  });
}

function setUsersBodyAjax() {
  setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/myChatApp/php/getUsers.php", true);
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (!search.classList.contains('isActive')) {
          allUsers.innerHTML = this.responseText;
        }
      }
    };
    xhr.send();
  }, 1000);
}

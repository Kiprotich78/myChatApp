form.onsubmit = function (e) {
  e.preventDefault();
};

function getAjax() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/myChatApp/php/sendChat.php", true);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const response = this.responseText;
      console.log(response);
    }
  };
  const hours = new Date().getHours();
  const minute = new Date().getMinutes();
  const time = formatTime(hours, minute);
  const formData = new FormData(form);
  formData.append("time", time);

  xhr.send(formData);
}

function receiveChatAjax() {
  const xhr2 = new XMLHttpRequest();
  xhr2.open("GET", "/myChatApp/php/receiveChat.php", true);
  xhr2.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const response = this.responseText;
      chatSection.innerHTML = response;
      chatSection.scrollTop = chatSection.scrollHeight;
    }
  };
  xhr2.send();
}

setInterval(receiveChatAjax, 1000);

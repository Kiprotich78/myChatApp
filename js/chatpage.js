const input = document.querySelector("input");
const clicked = document.querySelector("span");
const chatSection = document.querySelector(".chatSection");
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

function rendermessage() {
  const timeHour = new Date().getHours();
  const timeMinute = new Date().getMinutes();
  const formatedTime = formatTime(timeHour, timeMinute);
  const message = input.value;
  chatSection.innerHTML += `
            <div class="chat sentChat">
                <div class="chat-container">
                    <div class="chat-header">
                    <div class="time">${formatedTime}</div>
                    </div>
                    <div class="message">
                        ${message}
                    </div>
                </div>`;

  input.value = "";
  clicked.style.pointerEvents = "none";
  chatSection.scrollTop = chatSection.scrollHeight;
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

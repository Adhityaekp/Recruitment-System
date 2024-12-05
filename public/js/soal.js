function startTimer(duration, display) {
    let timer = duration,
        hours,
        minutes,
        seconds;
    setInterval(function () {
        hours = parseInt(timer / 3600, 10);
        minutes = parseInt((timer % 3600) / 60, 10);
        seconds = parseInt(timer % 60, 10);

        display.textContent =
            (hours < 10 ? "0" : "") +
            hours +
            ":" +
            (minutes < 10 ? "0" : "") +
            minutes +
            ":" +
            (seconds < 10 ? "0" : "") +
            seconds;

        if (--timer < 0) {
            timer = 0;
        }
    }, 1000);
}

window.onload = function () {
    let oneHour = 60 * 60,
        display = document.querySelector("#timer");
    startTimer(oneHour, display);
};

navigator.mediaDevices
    .getUserMedia({
        video: true,
    })
    .then(function (stream) {
        const videoElement = document.getElementById("webcam");
        videoElement.srcObject = stream;
    })
    .catch(function (error) {
        console.error("Error accessing webcam: ", error);
    });

const btnFinish = document.getElementById("btnFinish");
const confirmationPopup = document.getElementById("confirmationPopup");
const btnCancel = document.getElementById("btnCancel");
const btnConfirm = document.getElementById("btnConfirm");

btnFinish.addEventListener("click", function () {
    confirmationPopup.style.display = "flex";
});

btnCancel.addEventListener("click", function () {
    window.history.back();
});

btnConfirm.addEventListener("click", function () {
    window.location.href = "/user/end";
    confirmationPopup.style.display = "none";
});

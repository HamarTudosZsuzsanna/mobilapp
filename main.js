document.addEventListener("DOMContentLoaded", function () {

    let setTimeH1Element = document.querySelector(".set-time");
    let setTimeDivElement = document.querySelector(".login-form");

    setTimeout(() => {
        setTimeH1Element.style.visibility = "visible";
        setTimeDivElement.style.visibility = "visible";

    }, 5000);

});
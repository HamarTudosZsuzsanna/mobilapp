const dateInput = document.querySelector("#date");
let dateValue = dateInput.value;
dateInput.addEventListener('change', () => {
    dateValue = dateInput.value;
});

function getOptions(data) {
    const checkboxFormElement = document.querySelector("#checkboxForm");
    const dataContainer = document.querySelector(".data-container");

    data.forEach(item => {
        const inputElement = document.createElement('input');
        inputElement.type = 'checkbox';
        inputElement.name = 'players[]';
        inputElement.value = item.id;
        inputElement.id = item.id;
        const labelElement = document.createElement('label');
        labelElement.htmlFor = item.id;
        labelElement.textContent = item.name;
        checkboxFormElement.appendChild(inputElement);
        checkboxFormElement.appendChild(labelElement);
        const brEelement = document.createElement('br');
        checkboxFormElement.appendChild(brEelement);
        inputElement.classList.add('margin');
        labelElement.classList.add('margin');
    });

    const saveButton = document.createElement("button");
    saveButton.innerHTML = "Mentés";
    saveButton.id = "save";
    dataContainer.appendChild(saveButton);


    const showPlayerButton = document.querySelector("#showPlayer");


    showPlayerButton.addEventListener('click', () => {
        const selectedPlayers = [];

        let message = document.querySelector("#message");


        dataContainer.style.display = "flex";

        const closeButton = document.querySelector("#close");
        closeButton.addEventListener('click', () => {
            dataContainer.style.display = "none";
        });




        saveButton.addEventListener('click', async () => {

            if (!dateValue) {
                message.innerHTML = "Kérlek válassz egy dátumot!";
                return;
            }

            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(checkbox => {
                selectedPlayers.push(checkbox.value);
            }
            );

            message.innerHTML = "Sikeresen mentve!";
            message.style.color = "#3ecb05";
            console.log(selectedPlayers);
            console.log(dateValue);

            const bodyData = {
                date: dateValue,
                players: selectedPlayers
            };

            console.log('Küldendő adat:', JSON.stringify(bodyData));


            const result = await postData('../../api/save-attendance.php', bodyData);

            if (result.status === 'ok') {
                alert("Jelenlét mentve!");
            } else {
                alert("Hiba: " + result.message);
            }

        });

    });
}


document.addEventListener('DOMContentLoaded', async () => {
    const data = await getData('../../api/get-players.php');
    console.log(data);
    getOptions(data);
});
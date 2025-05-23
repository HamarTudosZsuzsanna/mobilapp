

function getOptions(data){
    const selectElement = document.querySelector("#player");

    data.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id;
        option.textContent = item.name;
        selectElement.appendChild(option);
    });

    selectElement.addEventListener('change', async (event) => {
        const selectedPlayerId = event.target.value;
        const playerData = await getData(`../../api/get-player-id.php?id=${selectedPlayerId}`);
        console.log(playerData);

        const dataContainer = document.querySelector(".data-container");
        dataContainer.style.display = "flex";

        dataContainer.innerHTML = `
            <div class="details-container">
                <div class="text">név</div>
                <div class="data">${playerData.name}</div>
            </div>
            <div class="details-container">
                <div class="text">születési dátum, idő</div>
                <div class="data">${playerData.birthday}</div>
            </div>
            <div class="details-container">
                <div class="text">lakcím</div>
                <div class="data">${playerData.address}</div>
            </div>
            <div class="details-container">
                <div class="text">email cím</div>
                <div class="data">${playerData.email}</div>
            </div>
            <hr>
            <div class="details-container">
                <div class="text">versenyeng. szám</div>
                <div class="data">${playerData.license}</div>
            </div>
            <div class="details-container">
                <div class="text">mezszám</div>
                <div class="data">${playerData.number}</div>
            </div>
            <button class="btn" id="close">Bezárás</button>
        `
        const closeButton = document.querySelector("#close");
        closeButton.addEventListener('click', () => {
            dataContainer.style.display = "none";
        });

    });
}


document.addEventListener('DOMContentLoaded', async () => {
    const data = await getData('../../api/get-player-id.php');
    getOptions(data);
});
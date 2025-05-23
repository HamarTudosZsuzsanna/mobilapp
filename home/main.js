/*getData('../api/get-message.php');*/
function formatDateTime(datetimeString) {
    const date = new Date(datetimeString);
    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');
    const hour = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');

    return `${year}-${month}-${day} ${hour}:${minutes}`;
}

function getCards(data) {
    let mainElement = document.querySelector('main');
    mainElement.innerHTML = '';

    data.forEach(element => {
        let messageContainer = document.createElement('div');
        messageContainer.classList.add('message-container');
        messageContainer.innerHTML = `
            <img src="../assets/img/${element.icon}.png" alt="${element.icon}" class="icons">
            <div class="message">${element.text}</div>
        `;

        let dateElement = document.createElement('div');
        dateElement.classList.add('date');
        dateElement.innerHTML = `
            <div class="date">${formatDateTime(element.created_at)}</div>
        `;

        mainElement.appendChild(messageContainer);
        messageContainer.insertAdjacentElement("afterend", dateElement);

        if(element.id > 1) {
            mainElement.insertAdjacentElement("afterbegin", messageContainer);
            messageContainer.insertAdjacentElement("afterend", dateElement);
        }

        if (element.icon === 'fontos') {
            document.querySelector(".message").classList.add('crucial');
        }

    });
};

document.addEventListener('DOMContentLoaded', async () => {
    const data = await getData('../api/get-message.php');
    getCards(data);
});
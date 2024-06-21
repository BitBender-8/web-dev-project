function showError(field, message) {
    const errorBox = document.createElement('div');
    errorBox.className = 'err-box';
    errorBox.innerHTML = `
        <b style="color: black;">Form Error:</b>
        <br>
        <b>Field:</b> ${field}</li>
        <br>
        <b>Message:</b> ${message}</li>
    `;

    const errContainer = document.body.querySelector('#err-container');
    errContainer.appendChild(errorBox);

    // Automatically remove error box after 5 seconds
    setTimeout(() => {
        errorBox.remove();
    }, 12000);

    // Add event listener to remove error box on click
    errorBox.addEventListener('click', () => {
        errorBox.remove();
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const notificationToggle = document.querySelector('.active-Mode'); // Asegúrate de que el ID coincide con el botón de alternancia de modo claro

    if (notificationToggle) {
        // Configura el estado inicial del botón en función de la cookie
        notificationToggle.checked = getCookie('lightMode') === 'enabled';

        notificationToggle.addEventListener('click', function () {
            if (notificationToggle.checked) {
                setCookie('lightMode', 'enabled', 7); // Habilita modo claro
            } else {
                setCookie('lightMode', 'disabled', 7); // Deshabilita modo claro
            }
        });
    }
});

// Función para obtener el valor de una cookie
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Función para establecer una cookie
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = `expires=${date.toUTCString()}`;
    document.cookie = `${name}=${value}; ${expires}; path=/`;
}
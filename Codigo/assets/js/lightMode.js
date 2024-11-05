document.addEventListener('DOMContentLoaded', function () {
    let isLightMode = false;

    // Creamos los enlaces a los archivos CSS para el modo claro
    let lightHeaderLink = document.createElement('link');
    lightHeaderLink.rel = 'stylesheet';
    lightHeaderLink.href = 'assets/css/lightViews/lightHeader.css'; // Estilos para el header
    lightHeaderLink.id = 'lightHeaderStyle';

    let lightFooterLink = document.createElement('link');
    lightFooterLink.rel = 'stylesheet';
    lightFooterLink.href = 'assets/css/lightViews/lightFooter.css'; // Estilos para el footer
    lightFooterLink.id = 'lightFooterStyle';

    let lightLoginLink = document.createElement('link');
    lightLoginLink.rel = 'stylesheet';
    lightLoginLink.href = 'assets/css/lightViews/lightLogin.css'; // Estilos específicos para la página de login
    lightLoginLink.id = 'lightLoginStyle';

    let lightConfigLink = document.createElement('link');
    lightConfigLink.rel = 'stylesheet';
    lightConfigLink.href = 'assets/css/lightViews/lightConfig.css'; // Estilos específicos para la página de Config
    lightConfigLink.id = 'lightConfigStyle';

    let lightForoLink = document.createElement('link');
    lightForoLink.rel = 'stylesheet';
    lightForoLink.href = 'assets/css/lightViews/lightForo.css'; // Estilos específicos para la página de Foro
    lightForoLink.id = 'lightForoStyle';

    let lightPreguntaLink = document.createElement('link');
    lightPreguntaLink.rel = 'stylesheet';
    lightPreguntaLink.href = 'assets/css/lightViews/lightPregunta.css'; // Estilos específicos para la página de Pregunta
    lightPreguntaLink.id = 'lightPreguntaStyle';

    let lightPublicarLink = document.createElement('link');
    lightPublicarLink.rel = 'stylesheet';
    lightPublicarLink.href = 'assets/css/lightViews/lightPublicar.css'; // Estilos específicos para la página de Publicar
    lightPublicarLink.id = 'lightPublicarStyle';

    let lightResponderLink = document.createElement('link');
    lightResponderLink.rel = 'stylesheet';
    lightResponderLink.href = 'assets/css/lightViews/lightResponder.css'; // Estilos específicos para la página de Responder
    lightResponderLink.id = 'lightResponderStyle';

    let lightPerfilUsuarioLink = document.createElement('link');
    lightPerfilUsuarioLink.rel = 'stylesheet';
    lightPerfilUsuarioLink.href = 'assets/css/lightViews/lightPerfilUsuario.css'; // Estilos específicos para la página de Perfil del Usuario
    lightPerfilUsuarioLink.id = 'lightResponderStyle';

    let lightPreguntaUsuarioLink = document.createElement('link');
    lightPreguntaUsuarioLink.rel = 'stylesheet';
    lightPreguntaUsuarioLink.href = 'assets/css/lightViews/lightPreguntaUsuario.css'; // Estilos específicos para la página de Preguntas de Usuario
    lightPreguntaUsuarioLink.id = 'lightResponderStyle';

    let lightNotificacionesLink = document.createElement('link');
    lightNotificacionesLink.rel = 'stylesheet';
    lightNotificacionesLink.href = 'assets/css/lightViews/lightNotificaciones.css'; // Estilos específicos para la página de Notificaciones de Usuario
    lightNotificacionesLink.id = 'lightNotificacionesStyle';

    let lightAdmin_ProfileLink = document.createElement('link');
    lightAdmin_ProfileLink.rel = 'stylesheet';
    lightAdmin_ProfileLink.href = 'assets/css/lightViews/lightAdmin_Profile.css'; // Estilos específicos para la página de Notificaciones de Usuario
    lightAdmin_ProfileLink.id = 'lightAdmin_ProfileStyle';

    // Verifica si el modo claro está activado en las cookies
    if (getCookie('lightMode') === 'enabled') {
        document.head.appendChild(lightHeaderLink);
        document.head.appendChild(lightFooterLink);
        document.head.appendChild(lightPreguntaUsuarioLink);

        // Aplica lightLogin.css solo en la página de login
        if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=login')) {
            document.head.appendChild(lightLoginLink);
        }
        // Aplica lightConfig.css solo en la página de Config (controller=ajustes y action=viewSettings)
        if (window.location.search.includes('controller=ajustes') && window.location.search.includes('action=viewSettings')) {
            //console.log("Aplicando za lightConfig.css en la página de ajustes");
            document.head.appendChild(lightConfigLink);
        }
        // Aplica lightForo.css solo en la página de Config (controller=preguntas y action=list_paginated)
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=list_paginated')) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=modelos') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=motorizacion') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=sistema') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=especificaciones') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=componentes') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=search') ) {
            document.head.appendChild(lightForoLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=detail') ) {
            document.head.appendChild(lightPreguntaLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=loadForm') ) {
            document.head.appendChild(lightPublicarLink);
        }
        if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=responder') ) {
            document.head.appendChild(lightResponderLink);
        }
        if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=viewProfile') ) {
            document.head.appendChild(lightPerfilUsuarioLink);
        }
        if (window.location.search.includes('controller=notificaciones') && window.location.search.includes('action=viewNotifications') ) {
            document.head.appendChild(lightNotificacionesLink);
        }
        if (window.location.search.includes('controller=admin') && window.location.search.includes('action=viewProfileAdmin') ) {
            document.head.appendChild(lightAdmin_ProfileLink);
        }

        isLightMode = true;
    }

    const themeToggle = document.querySelector('#LightModeIcon');

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            isLightMode = !isLightMode;

            if (isLightMode) {
                document.head.appendChild(lightHeaderLink);
                document.head.appendChild(lightFooterLink);

                if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=login')) {
                    document.head.appendChild(lightLoginLink);
                }

                if (window.location.search.includes('controller=ajustes') && window.location.search.includes('action=viewSettings')) {
                    document.head.appendChild(lightConfigLink);
                }

                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=list_paginated')) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=modelos') ) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=motorizacion') ) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=sistema') ) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=especificaciones') ) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=componentes') ) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=search')) {
                    document.head.appendChild(lightForoLinkLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=detail')) {
                    document.head.appendChild(lightPreguntaLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=loadForm')) {
                    document.head.appendChild(lightPublicarLink);
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=responder')) {
                    document.head.appendChild(lightResponderLink);
                }
                if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=viewProfile')) {
                    document.head.appendChild(lightResponderLink);
                }
                if (window.location.search.includes('controller=notificaciones') && window.location.search.includes('action=viewNotifications')) {
                    document.head.appendChild(lightNotificacionesLink);
                }
                if (window.location.search.includes('controller=admin') && window.location.search.includes('action=viewProfileAdmin')) {
                    document.head.appendChild(lightAdmin_ProfileLink);
                }


                setCookie('lightMode', 'enabled', 7);
            } else {
                document.getElementById('lightHeaderStyle')?.remove();
                document.getElementById('lightFooterStyle')?.remove();

                if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=login')) {
                    document.getElementById('lightLoginStyle')?.remove();
                }

                if (window.location.search.includes('controller=ajustes') && window.location.search.includes('action=viewSettings')) {
                    document.getElementById('lightConfigStyle')?.remove();
                }

                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=list_paginated')) {
                    document.getElementById('lightForoStyle')?.remove();
                }

                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=modelos') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=motorizacion') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=sistema') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=especificaciones') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=listByCategory')&& window.location.search.includes('category=componentes') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=search') ) {
                    document.getElementById('lightForoStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=detail') ) {
                    document.getElementById('lightPreguntaStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=loadForm') ) {
                    document.getElementById('lightPublicarStyle')?.remove();
                }
                if (window.location.search.includes('controller=preguntas') && window.location.search.includes('action=responder') ) {
                    document.getElementById('lightResponderStyle')?.remove();
                }
                if (window.location.search.includes('controller=usuario') && window.location.search.includes('action=viewProfile') ) {
                    document.getElementById('lightResponderStyle')?.remove();
                }
                if (window.location.search.includes('controller=notificaciones') && window.location.search.includes('action=viewNotifications') ) {
                    document.getElementById('lightNotificacionesStyle')?.remove();
                }
                if (window.location.search.includes('controller=admin') && window.location.search.includes('action=viewProfileAdmin') ) {
                    document.getElementById('lightAdmin_ProfileStyle')?.remove();
                }

                setCookie('lightMode', 'disabled', 7);
            }
        });
    }
});

// Funciones para gestionar cookies
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
document.addEventListener('DOMContentLoaded', init);

function init() {
    eventListeners();
    darkMode();
}

function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // Aplicar el modo oscuro inicial
    toggleDarkMode(prefiereDarkMode.matches);

    prefiereDarkMode.addEventListener('change', function () {
        toggleDarkMode(prefiereDarkMode.matches);
    });

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
}

function toggleDarkMode(isDarkMode) {
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

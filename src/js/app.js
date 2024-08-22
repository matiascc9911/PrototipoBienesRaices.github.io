document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    })

    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(preferDarkMode.matches);

    preferDarkMode.addEventListener('change', function() {
        if (preferDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const contactMethods = document.querySelectorAll('input[name="contact[contacto]"]');
    contactMethods.forEach(input => input.addEventListener('click', showContactMethods));
        
    
}

function navegacionResponsive () {
    const navegacion = document.querySelector('.navegacion')

    if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }
}

function showContactMethods(e) {
    const contactDiv = document.querySelector('#contact');

    if(e.target.value === "telefono") {
        contactDiv.innerHTML = `
            <label for="telefono">Número Telefónico::</label>
            <input type="tel" placeholder="Ingrese su número de teléfono" id="telefono" name="contact[telefono]">

            <p>En caso de elegir teléfono, especifíque la fecha y la hora a continuación:</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contact[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="time" name="contact[hora]">
        `;
    } else {
        contactDiv.innerHTML = `
            <label for="email">Correo Electrónico:</label>
            <input type="email" placeholder="Ingrese su direccion de correo electrónico" id="email" name="contact[email]" required>
        `;
    }
}

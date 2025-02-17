// public/js/app.js

// Document ready function
document.addEventListener('DOMContentLoaded', function () {
    console.log('Documento listo y scripts personalizados cargados.');

    

    // Ejemplo de uso de jQuery (si está incluido)
    if (typeof jQuery !== 'undefined') {
        $(function () {
            $('.jquery-example').on('click', function () {
                alert('jQuery está funcionando!');
            });
        });
    }
});



// Llamar a la función de bienvenida
showWelcomeMessage();

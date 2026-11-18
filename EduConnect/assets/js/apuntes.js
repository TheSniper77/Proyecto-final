document.addEventListener("DOMContentLoaded", function () {

  const mensaje = document.getElementById( "mensajeExito");

    if (mensaje) {
        setTimeout(function () {mensaje.style.opacity ="0";
            setTimeout(function () {mensaje.remove();
            }, 500);
        }, 3000);
    }
});
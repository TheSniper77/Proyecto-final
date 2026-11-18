const mensaje = document.getElementById("mensaje");
    if(mensaje){ setTimeout(() => {
        mensaje.style.opacity = "0";
            setTimeout(() => {
                mensaje.style.display = "none";
                    }, 500);
                        }, 3000);
}

document.addEventListener("DOMContentLoaded", function () {

    // Declaracion de los elementos de apuntes y eventos
    // Elementos de Apuntes
    const btnApunte = document.getElementById("btnApunte");
    const overlay = document.getElementById("overlay");
    const overlayEditarApunte = document.getElementById("overlayEditarApunte");
    
    // Elementos del Modal de Confirmación de Borrado
    const modalConfirmar = document.getElementById("modalConfirmar");
    const btnCancelarBorrar = document.getElementById("btnCancelarBorrar");
    const enlaceEliminarSeguro = document.getElementById("enlaceEliminarSeguro");

    // Elementos de Eventos del Calendario
    // Crear evento
    const btnEvento = document.getElementById("btnEvento");
    const overlayEvento = document.getElementById("overlayEvento");
    //Borrar Evento
    const btnBevento = document.getElementById("btnBevento");
    const overlayBEvento = document.getElementById("overlayBEvento");
    // Actualizar evento
    const btnEditarEvento = document.getElementById("btnEditarEvento");
    const overlayEditarEvento = document.getElementById("overlayEditarEvento");

    // Elementos de Archivos
    //Subir Archivo
    const btnArchivo = document.getElementById("btnArchivo");
    const overlayArchivo = document.getElementById("overlayArchivo");
    // Borrar Archivo
    const btnBArchivo = document.getElementById("btnBArchivo");
    const overlayBArchivo = document.getElementById("overlayBArchivo");
    //Actualizar archivo
    const btnEArchivo = document.getElementById("btnEArchivo");
    const overlayEArchivo = document.getElementById("overlayEArchivo");

    // LOGICA ARCHIVO
    //Subir archivo
    if (btnArchivo && overlayArchivo) {
        btnArchivo.addEventListener("click", () => {
            overlayArchivo.style.display = "flex";
        });
    }

    if (overlayArchivo) {
        overlayArchivo.addEventListener("click", (e) => {
            if (e.target === overlayArchivo) {
                overlayArchivo.style.display = "none";
            }
        });
    }

    // Borrar archivo
    if (btnBArchivo && overlayBArchivo) {
        btnBArchivo.addEventListener("click", function () {
            overlayBArchivo.style.display = "flex";
        });
    }

    if (overlayBArchivo) {
        overlayBArchivo.addEventListener("click", function (e) {
            if (e.target === overlayBArchivo) {
            overlayBArchivo.style.display = "none";
            }
        });
    }

    // Actualizar archivo
    if (btnEArchivo && overlayEArchivo) {
        btnEArchivo.addEventListener("click", () => {
            overlayEArchivo.style.display = "flex";
        });
    }

    if (overlayEArchivo) {
        overlayEArchivo.addEventListener("click", (e) => {
            if (e.target === overlayEArchivo) {
                overlayEArchivo.style.display = "none";
            }
        });
    }

    // Logica de apuntes
    if (btnApunte && overlay) { 
        btnApunte.addEventListener("click", () => { 
            overlay.style.display = "flex"; 
        }); 
    }

    if (overlay) { 
        overlay.addEventListener("click", (e) => { 
            if (e.target === overlay) { 
                overlay.style.display = "none"; 
            } 
        }); 
    }

    // Crear eventos
    if (btnEvento && overlayEvento) {
        btnEvento.addEventListener("click", function () {
            overlayEvento.style.display = "flex";
        });
    }

    if (overlayEvento) {
        overlayEvento.addEventListener("click", function (e) {
            if (e.target === overlayEvento) {
                overlayEvento.style.display = "none";
            }
        });
    }

    // Borrar evento
    if (btnBevento && overlayBEvento) {
        btnBevento.addEventListener("click", function () {
            overlayBEvento.style.display = "flex";
        });
    }

    if (overlayBEvento) {
        overlayBEvento.addEventListener("click", function (e) {
            if (e.target === overlayBEvento) {
            overlayBEvento.style.display = "none";
            }
        });
    }

    // Editar evento
    if (btnEditarEvento && overlayEditarEvento) {
        btnEditarEvento.addEventListener("click", function () { 
            overlayEditarEvento.style.display ="flex";
        });
    }

    if (overlayEditarEvento) {
        overlayEditarEvento.addEventListener("click", function (e) {
            if (e.target === overlayEditarEvento) {
            overlayEditarEvento.style.display = "none";
            }
        });
    }

    // Logiga para el modal de borrar
    // Capturar el clic en cualquier botnn de eliminar de la lista
    document.querySelectorAll(".btn-confirmar-eliminar").forEach(boton => {
        boton.addEventListener("click", function () {
            const idApunte = this.getAttribute("data-id");
            
            // Construimos la URL de eliminacion
            if (enlaceEliminarSeguro) {
                enlaceEliminarSeguro.href = `apunte.php?eliminar=${idApunte}`;
            }
            
            // Mostramos el modal de confirmacion con el estilo flex
            if (modalConfirmar) {
                modalConfirmar.style.display = "flex";
            }
        });
    });

    // Si el usuario hace clic en Cancelar, cerramos el modal
    if (btnCancelarBorrar && modalConfirmar) {
        btnCancelarBorrar.addEventListener("click", function () {
            modalConfirmar.style.display = "none";
        });
    }

    // Cerrar si hacen clic fuera del cuadro blanco de confirmación
    if (modalConfirmar) {
        modalConfirmar.addEventListener("click", function (e) {
            if (e.target === modalConfirmar) {
                modalConfirmar.style.display = "none";
            }
        });
    }

    // Logica para editar apuntes
        document.querySelectorAll(".btnEditarApunte").forEach(boton => {
        boton.addEventListener("click", function () {
            document.getElementById("editar_id").value = this.dataset.id;
            document.getElementById("editar_nombre").value = this.dataset.nombre;
            document.getElementById("editar_contenido").value = this.dataset.contenido;
            overlayEditarApunte.style.display = "flex";
        });
    });

    if (overlayEditarApunte) {
        overlayEditarApunte.addEventListener(
            "click",
            function (e) {
                if (e.target === overlayEditarApunte) {
                    overlayEditarApunte.style.display = "none";
                }
            }
        );
    }
    
});

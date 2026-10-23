const boton = document.getElementById("btnEvento");

const overlay =document.getElementById("overlay");

const formulario =document.getElementById("formEvento");

boton.addEventListener("click", () => {overlay.style.display = "flex";});

// Cerrar al hacer click fuera

overlay.addEventListener("click", (e) => {if(e.target === overlay){overlay.style.display = "none";}});
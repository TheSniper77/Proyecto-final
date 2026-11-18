document.addEventListener("DOMContentLoaded", () => {
    const inputBusqueda = document.getElementById("busquedaArchivo");
    
    if (inputBusqueda) {
        inputBusqueda.addEventListener("input", function() {
            const textoBusqueda = this.value.toLowerCase().trim();
            const filasTabla = document.querySelectorAll("table tbody tr");

            filasTabla.forEach(fila => {
                // Obtenemos el texto de la segunda columna (que es el Nombre del archivo)
                const columnaNombre = fila.querySelector("td:nth-child(2)");
                
                if (columnaNombre) {
                    const nombreTexto = columnaNombre.textContent.toLowerCase();
                    
                    // Si el nombre coincide con lo que se está escribiendo, se muestra; si no, se oculta
                    if (nombreTexto.includes(textoBusqueda)) {
                        fila.style.display = "";
                    } else {
                        fila.style.display = "none";
                    }
                }
            });
        });
    }
});
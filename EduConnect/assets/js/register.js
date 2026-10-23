// Seleccionamos todos los elementos necesarios
const inputPass = document.getElementById('password'); 
const alerta = document.getElementById('alerta-pass');

const letter = document.getElementById("letter");
const capital = document.getElementById("capital");
const number = document.getElementById("number");
const length = document.getElementById("length");
const contenedorRequisitos = document.getElementById("requisitos-password");

// Ocultamos los requisitos al cargar la pagina inicialmente
if (contenedorRequisitos) {
    contenedorRequisitos.style.display = 'none';
}

// Funcion secundaria: Cambia el color y el simbolo de cada requisito directamente
function actualizarRequisito(elemento, cumple, textoBase) {
    if (cumple) {
        elemento.style.color = "#2ecc71"; // Verde
        elemento.textContent = "✔" + textoBase;
    } else {
        elemento.style.color = "#e74c3c"; // Rojo
        elemento.textContent = "✖" + textoBase;
    }
}

// Funcion principal que valida la contrasena completa
function validarPassword() {
    const valor = inputPass.value;

    // Evaluamos cada regla por separado para los indicadores visuales
    const tieneMinuscula = /[a-z]/.test(valor);
    const tieneMayuscula = /[A-Z]/.test(valor);
    const tieneNumero = /\d/.test(valor);
    const largoCorrecto = valor.length >= 8 && valor.length <= 20;

    // Actualizamos el color y texto de cada uno directamente por JS
    actualizarRequisito(letter, tieneMinuscula, "Debe contener una letra minuscula");
    actualizarRequisito(capital, tieneMayuscula, "Debe contener una letra mayuscula");
    actualizarRequisito(number, tieneNumero, "Debe contener un numero");
    actualizarRequisito(length, largoCorrecto, "Debe tener entre 8 y 20 caracteres");

    // Validacion global ajustada (comprueba largo, digito, minuscula y mayuscula de forma segura)
    const regexGlobal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d$.%@!*#?&]{8,20}$/;
    const esValida = regexGlobal.test(valor);

    // Manejo del bloque de alerta general con el contador dinamico
    if (valor.length > 0 && !esValida) {
        if (valor.length < 8) {
            alerta.textContent = "La contrasena debe tener minimo 8 caracteres (llevas " + valor.length + ").";
        } else if (valor.length > 20) {
            alerta.textContent = "La contrasena es demasiado larga (maximo 20 caracteres).";
        } else {
            alerta.textContent = "La contrasena debe incluir mayusculas, minusculas y numeros sin espacios.";
        }
        alerta.style.display = 'block';
        return false; 
    } else {
        alerta.style.display = 'none'; 
        return true; 
    }
}

// Muestra los requisitos solo cuando el usuario entra al casillero
inputPass.addEventListener('focus', function() {
    if (contenedorRequisitos) {
        contenedorRequisitos.style.display = 'block';
    }
});

// Oculta los requisitos cuando el usuario sale del casillero
inputPass.addEventListener('blur', function() {
    if (contenedorRequisitos) {
        contenedorRequisitos.style.display = 'none';
    }
});

// Escuchamos cuando el usuario escribe en el campo de texto
inputPass.addEventListener('input', validarPassword);

// Evitamos el envio del formulario al backend PHP si no es valida
document.querySelector('form').addEventListener('submit', function(event) {
    if (!validarPassword()) {
        event.preventDefault(); // Cancela el envio
        inputPass.focus(); // Coloca el foco en el input de la contrasena
    }
});
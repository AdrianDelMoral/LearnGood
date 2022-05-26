let rol_seleccionado = null;
const selectElement = document.querySelector('.roles'); // seleccionar el select de roles
let type_selected = document.createElement("p"); // crear texto para decir que rol a seleccionado
let select_other = document.querySelector('.select_other'); // mostrar boton para reiniciar formulario
let resultado = null;

/* aqui mostrará los campos del formulario que sean necesarios en base al rol seleccionado */
selectElement.addEventListener('change', (event) => {

    /* Selecciona Profesor quitar los hidden de las clases que lo tienen */
    if (event.target.value == 'Profesor') {
        resultado = document.querySelector('.rol_seleccionado');
        resultado.className = 'rol_seleccionado'

        rol_seleccionado = event.target.value;
        rol_selected = document.querySelector('.rol_selected');
        rol_selected.className = 'rol_selected hidden';

        decir_rol = document.querySelector('.decir_rol');
        decir_rol.className = 'decir_rol';

        for (let clase_profesor of document.querySelectorAll('.profesor')) {
            clase_profesor.className = 'mt-4 profesor'
            console.log(clase_profesor);
        }
    }

    /* Selecciona Alumno mostrará los que no tienen la clase hidden */
    if (event.target.value == 'Alumno') {
        resultado = document.querySelector('.rol_seleccionado');
        resultado.className = 'rol_seleccionado'

        rol_seleccionado = event.target.value;
        rol_selected = document.querySelector('.rol_selected');
        rol_selected.className = 'rol_selected hidden';

        decir_rol = document.querySelector('.decir_rol');
        decir_rol.className = 'decir_rol';

    }
    type_selected.className = 'mx-8 py-5 flex justify-center text-2xl xs:text-2xl text-center items-center font-bold underline type_selected';
    type_selected.textContent = `Rol Seleccionado: ${event.target.value}`;
    decir_rol.appendChild(type_selected);

    select_other.className = 'select_other flex justify-center content-center';
});

/* aqui el boton de reiniciar la parte visual y se escondan los campos del formulario */
selectButton = document.querySelector('#bad_role');
selectButton.onclick = function(e) {

        resultado = document.querySelector('.rol_seleccionado');
        resultado.className = 'rol_seleccionado hidden'
        selectElement.disabled = false;

        // Recorrerá los divs con la clase profesor, y los pondrá como hidden
        for (let clase_profesor_ocultar of document.querySelectorAll('.profesor')) {
            clase_profesor_ocultar.className = 'mt-4 profesor hidden'
        }

        rol_selected = document.querySelector('.rol_selected');
        rol_selected.className = 'rol_selected';

        decir_rol = document.querySelector('.decir_rol');
        decir_rol.className = 'decir_rol hidden';

        type_selected.textContent = '';
        decir_rol.appendChild(type_selected);
        select_other.className = 'select_other hidden';
};

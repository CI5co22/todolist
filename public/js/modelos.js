    // Array para almacenar los modelos seleccionados
    let modelosSeleccionados = [];

    // Función para agregar un modelo a la lista de seleccionados
    function agregarModelo(id) {
        // Obtener el nombre del botón que se hizo clic
        const boton = document.querySelector(`button[onclick="agregarModelo('${id}')"]`);
        const nombre = boton.getAttribute('data-nombre');
    
        // Verificar si el modelo ya está seleccionado
        if (!modelosSeleccionados.some(m => m.id === id)) {
            modelosSeleccionados.push({ id, nombre });
            actualizarModelosSeleccionados();
        }
    }
    
    // Función para eliminar un modelo de la lista de seleccionados
    function eliminarModelo(id) {
        modelosSeleccionados = modelosSeleccionados.filter(m => m.id !== id);
        actualizarModelosSeleccionados();
    }
    
    // Función para actualizar la visualización de los modelos seleccionados
    function actualizarModelosSeleccionados() {
        const contenedor = document.getElementById('modelosSeleccionados');
        contenedor.innerHTML = ""; // Limpiar el contenedor
    
        modelosSeleccionados.forEach(modelo => {
            const etiqueta = document.createElement('div');
            etiqueta.className = 'bg-primary me-2 badge';
            etiqueta.innerHTML = `${modelo.nombre} <span style="cursor: pointer;" onclick="eliminarModelo('${modelo.id}')">&times;</span>`;
            contenedor.appendChild(etiqueta);
        });
    
        // Actualizar un campo oculto para enviar los modelos seleccionados en el formulario
        const inputHidden = document.getElementById('modelosHidden');
        if (!inputHidden) {
            const nuevoInput = document.createElement('input');
            nuevoInput.type = 'hidden';
            nuevoInput.id = 'modelosHidden';
            nuevoInput.name = 'modelos';
            document.querySelector('form').appendChild(nuevoInput);
        }
        // Enviar solo los IDs separados por comas
        document.getElementById('modelosHidden').value = modelosSeleccionados.map(m => m.id).join(',');
    }
    
    // // Cargar modelos seleccionados al cargar la página (opcional)
    // window.onload = function () {
    //     const modelosGuardados = localStorage.getItem('modelosSeleccionados');
    //     if (modelosGuardados) {
    //         modelosSeleccionados = JSON.parse(modelosGuardados);
    //         actualizarModelosSeleccionados();
    //     }
    // };
    
    // Guardar modelos seleccionados en localStorage (opcional)
    function guardarModelos() {
        localStorage.setItem('modelosSeleccionados', JSON.stringify(modelosSeleccionados));
    }
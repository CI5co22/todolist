$(document).ready(function () {
    $(".chk-estado").on("change", function () {
        let $chk = $(this);
        let id = $chk.data("id");
        let lastEstado = $chk.data("estado");
        let nuevoEstado = $chk.is(":checked") ? 1 : 0;
        let $texto = $chk.siblings(".tarea-nombre");

        // Cambio inmediato en la UI (sin esperar al servidor)
        if (nuevoEstado == 1) {
            $texto.addClass('completada');
        } else {
            $texto.removeClass('completada');
        }

        $.ajax({
            url: urlCambiarEstado,
            type: "POST",
            data: { check: id, lastEstado: lastEstado },
            success: function (resp) {
                console.log("Respuesta del servidor:", resp);
                if (resp.status === "ok") {
                    // Actualizar el data attribute
                    $chk.data("estado", resp.estado);
                    
                    // Sincronizar el checkbox con la respuesta del servidor
                    $chk.prop('checked', resp.estado == 1);
                    
                    // Actualizar la clase según la respuesta del servidor
                    if (resp.estado == 1) {
                        $texto.addClass('completada');
                    } else {
                        $texto.removeClass('completada');
                    }
                }
            },
            error: function(xhr, status, error){ 
                alert('Error al cambiar el estado');
            }
        });
    });
});
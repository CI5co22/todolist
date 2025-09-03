$(document).ready(function () {
    $(".chk-estado").on("change", function () {
        let $chk = $(this);
        let id = $(this).data("id");
        let lastEstado = $(this).data("estado");
        let nuevoEstado = $(this).is(":checked") ? 1 : 0;
        let $texto = $chk.siblings(".tarea-nombre");

        $chk.data("estado", nuevoEstado);
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
                    // $(`.chk-estado[data-id="${resp.id}"]`).data("estado", resp.estado);
                    $chk.data("estado", resp.estado);
                    $chk.prop('checked', resp.estado == 1);
                    
                    
                    if (resp.estado != nuevoEstado) {
                        if (resp.estado == 1) {
                            $texto.addClass('completada');
                        } else {
                            $texto.removeClass('completada');
                        }
                    }
            }
            },
            error: function(xhr, status, error){
                console.log("Error AJAX:", status, error);
                alert('error ddd');
            }
        });
    });
});

$(document).on("change", ".chk-estado", function () {
    let $chk = $(this);
    let id = $chk.data("id");
    let lastEstado = $chk.data("estado");
    
    // Buscar el texto: hermano .task_info -> hijo .tarea-nombre
    let $texto = $chk.siblings(".task_info").find(".tarea-nombre");

    $.ajax({
        url: urlCambiarEstado,
        type: "POST",
        data: { check: id, lastEstado: lastEstado },
        success: function (resp) {
            if (resp.status === "ok") {
                $chk.data("estado", resp.estado);
                $chk.prop('checked', resp.estado == 1);
                
                if (resp.estado == 1) {
                    $texto.addClass('completada');
                } else {
                    $texto.removeClass('completada');
                }
            }
        },
        error: function(xhr, status, error) {
            $chk.prop('checked', lastEstado == 1);
        }
    });
});
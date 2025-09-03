$(document).ready(function () {
    $(".chk-estado").on("change", function () {
        let $chk = $(this);
        let id = $chk.data("id");
        let lastEstado = $chk.data("estado");
        let $texto = $chk.siblings(".tarea-nombre");

        console.log("Antes - Estado:", lastEstado, "Checked:", $chk.is(":checked"));

        $.ajax({
            url: urlCambiarEstado,
            type: "POST",
            data: { check: id, lastEstado: lastEstado },
            success: function (resp) {
                console.log("Respuesta:", resp);
                
                if (resp.status === "ok") {
                    $chk.data("estado", resp.estado);
                    $chk.prop('checked', resp.estado == 1);
                    
                    // Forzar reflow para asegurar que se aplique el CSS
                    $texto.hide().show(0);
                    
                    if (resp.estado == 1) {
                        $texto.addClass('completada');
                        console.log("Añadiendo clase completada");
                    } else {
                        $texto.removeClass('completada');
                        console.log("Removiendo clase completada");
                    }
                    
                    console.log("Después - Estado:", resp.estado, "Checked:", $chk.is(":checked"));
                }
            },
            error: function(xhr, status, error){
                console.log("Error:", error);
                $chk.prop('checked', lastEstado == 1);
            }
        });
    });
});
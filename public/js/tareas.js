$(document).ready(function() {
    $(".chk-estado").on("change", function () {
        let $chk = $(this); 
        let id = $chk.data("id");
        let nuevoEstado = $chk.is(":checked") ? 1 : 0;

        $.ajax({
            url: urlCambiarEstado,
            type: "POST",
            data: { check: id, estado: nuevoEstado },
            success: function(resp){
                if(resp.status === "ok"){
                    $chk.data("estado", resp.estado);

                    let $texto = $chk.siblings(".tarea-nombre");
                    if(resp.estado == 1){
                        $texto.addClass('completada');
                    } else {
                        $texto.removeClass('completada');
                    }
                }
            },
            error: function(xhr, status, error){
                console.error("Error AJAX:", error);
            }
        });
    });
});

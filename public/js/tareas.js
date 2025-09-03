$(document).ready(function () {
    $(".chk-estado").on("change", function () {
        let $chk = $(this);
        let id = $(this).data("id");
        let lastEstado = $(this).data("estado");
        let nuevoEstado = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            url: urlCambiarEstado,
            type: "POST",
            data: { check: id, lastEstado: lastEstado },
            success: function (resp) {
                console.log("Respuesta del servidor:", resp);
                if (resp.status === "ok") {
                    $(`.chk-estado[data-id="${resp.id}"]`).data("estado", resp.estado);
                }
                let $texto = $chk.closest("p").find(".tarea-nombre");
                if(resp.estado == 1){
                    $texto.html('<s>' + $texto.text() + '</s>');
                } else {
                    $texto.text($texto.text()); 
                }
            },
            error: function(xhr, status, error){
                console.log("Error AJAX:", status, error);
                alert('error ddd');
            }
        });
    });
});

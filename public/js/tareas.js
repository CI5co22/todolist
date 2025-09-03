$(document).ready(function () {
    $(".chk-estado").on("change", function () {
        let id = $(this).data("id");
        let lastEstado = $(this).data("estado");
        let nuevoEstado = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            url: "<?= base_url('cambiarEstado') ?>",
            type: "POST",
            data: { check: id, lastEstado: lastEstado },
            success: function (resp) {
                console.log("Respuesta del servidor:", resp);
                if (resp.status === "ok") {
                    $(`.chk-estado[data-id="${resp.id}"]`).data("estado", resp.estado);
                }
            },
            error: function () {
                console.error("Error AJAX:", status, error);
                console.error("Respuesta servidor:", xhr.responseText);
                alert("Error al actualizar tarea");
            }
        });
    });
});

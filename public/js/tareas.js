$(document).ready(function () {
    console.log("=== INICIALIZACIÓN ===");
    console.log("URL Cambiar Estado:", urlCambiarEstado);
    console.log("Checkboxes encontrados:", $(".chk-estado").length);
    
    $(".chk-estado").each(function(index) {
        console.log("Checkbox", index, "- ID:", $(this).data("id"), "Estado:", $(this).data("estado"));
    });

    $(document).on("change", ".chk-estado", function () {
        console.log("=== EVENTO CHANGE ===");
        let $chk = $(this);
        let id = $chk.data("id");
        let lastEstado = $chk.data("estado");
        let $texto = $chk.siblings(".tarea-nombre");

        console.log("Checkbox clickeado - ID:", id, "Estado anterior:", lastEstado);
        console.log("Elemento texto encontrado:", $texto.length);

        // Prevenir el comportamiento por defecto temporalmente
        event.preventDefault();
        
        $.ajax({
            url: urlCambiarEstado,
            type: "POST",
            data: { check: id, lastEstado: lastEstado },
            success: function (resp) {
                console.log("=== RESPUESTA AJAX ===");
                console.log("Respuesta completa:", resp);
                console.log("resp.status:", resp.status);
                console.log("resp.estado:", resp.estado);
                console.log("Tipo de resp.estado:", typeof resp.estado);
                
                if (resp.status === "ok") {
                    $chk.data("estado", resp.estado);
                    $chk.prop('checked', resp.estado == 1);
                    
                    console.log("Clases antes:", $texto.attr('class'));
                    if (resp.estado == 1) {
                        $texto.addClass('completada');
                        console.log("Clases después (añadido):", $texto.attr('class'));
                    } else {
                        $texto.removeClass('completada');
                        console.log("Clases después (removido):", $texto.attr('class'));
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log("=== ERROR AJAX ===");
                console.log("Status:", status);
                console.log("Error:", error);
                console.log("Response:", xhr.responseText);
                $chk.prop('checked', lastEstado == 1);
            }
        });
    });
});
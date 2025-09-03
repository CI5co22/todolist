
$(document).ready(function() {
    $('.p-1').each(function() {
        let prioridad = $(this).data('prioridad'); 
        
        $(this).removeClass('p1 p2 p3');

        if(prioridad == 1) {
            $(this).addClass('p1');
        } else if(prioridad == 2) {
            $(this).addClass('p2');
        } else if(prioridad == 3) {
            $(this).addClass('p3');
        }
    });
});


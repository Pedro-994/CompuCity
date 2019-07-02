$(document).ready(function(){

    $('.lista-categoria .categoria[category="all"]').addClass('ct_item-activo');

    $('.categoria').click(function(){
        var catProducto = $(this).attr('category'); 
        console.log(catProducto);
        $('.categoria').removeClass('ct_item-activo');
        $(this).addClass('ct_item-activo');

        $('.producto').hide();

        $('.producto[category="'+catProducto+'"]').show();

    });

    $('.categoria[category="all"]').click(function(){
        $('.producto').show();
    });
});


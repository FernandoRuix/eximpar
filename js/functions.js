$(window).on('load', function(){
    $('#loader').css({'opacity': '0'});
    $('body').css({'overflow': 'auto'});
    setTimeout(function loader_timeout(){
        $('#loader').hide();
    }, 150);
});

// PRODUCTOS-FILTER::START
$(document).on('click','#drp', function(){
    let dropdown = document.querySelector('.tiendaFilter');
    if (dropdown.classList.contains('closed')) {
        dropdown.classList.remove('closed')
    } else {
        dropdown.classList.add('closed')    
    }
});
$(document).on('click','.filter_li .fa-chevron-up', function(){
    //let dropdown = document.querySelector('.sub_filter ul');
    let dropdown = $(this).parent().next('.sub_filter').children();
    if(dropdown.hasClass("closed")){
        $(this).addClass('rotate');
        dropdown.removeClass('closed');
    } else {
        dropdown.addClass('closed')    
        $(this).removeClass('rotate');
    }
})
// PRODUCTOS-FILTER::END


// PRODUCTS-CART::START
$('.cart_button').click(function(e) {
    var cart = $('.cart');
    $('.cartbg').css({"display":"block"});
    $('body').css({"overflow":"hidden"});
    cart.addClass('cart-active');
});

$('.close-cart').click(function(e) {
    e.preventDefault();
    close_cart();
});

$('.cartbg').click(function(e) {
    e.preventDefault();
    close_cart();
});

/*USING ESCAPE BUTTON*/
$(document).on('keyup', function(e) {
    if (e.key == "Escape" && $('.cart').hasClass('cart-active')){ 
        close_cart();
    }
});

function close_cart(params) {
    var cart = $('.cart');
    cart.removeClass('cart-active');
    $('.cartbg').removeAttr("style");
    $('body').removeAttr("style");
}
// PRODUCTS-CART::END

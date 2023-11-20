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

//USING ESCAPE BUTTON
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

$(document).ready(function() {

    setTimeout(fade_alert, 2500)
    function fade_alert() {
        $("#alert_box div").css({"opacity":"0"});
        setTimeout(remove_alert, 300)
    }
    function remove_alert() {
        $("#alert_box div").css({"display":"none"});
    }
});
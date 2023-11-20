
//page fully loaded
$(window).on('load', function(){
    $(".main_image img").addClass('main_image--active');
    main_text_animation.play();
    f_about_animation();
    f_logos_animation()
});

//anime.js on scroll
var logos_animation_complete = false;
var about_animation_complete = false;

$(document).scroll(function() {
    f_about_animation();
    f_logos_animation()
});

function f_about_animation(){
    var height = $(window).scrollTop() + $(window).height();
    var about_height = $(".about").offset().top;
    if(height > about_height && about_animation_complete == false) {
        about_animation_complete = true;
        about_animation.play();
    }
}
function f_logos_animation(){
    var height = $(window).scrollTop() + $(window).height();
    var logos_height = $(".marcas-body").offset().top;
    if(height > logos_height && logos_animation_complete == false) {
        logos_animation_complete = true;
        logos_animation.play();
    }
}


//anime.js functions
var logos_animation = anime({
    targets: '.marcas .marcas-item',
    easing: 'linear',
    duration: 300,
    translateY: ['50%', '0%'],
    opacity: [0, 1],
    autoplay: false,
    delay: anime.stagger(150, {start: 500})
});
var main_text_animation = anime({
    targets: '.main_body div h4',
    easing: 'linear',
    scale: [0.7,1],
    duration: 300,
    opacity: [0, 1],
    autoplay: false,
    delay: anime.stagger(500, {start: 500})
})
var about_animation = anime({
    targets: '.about',
    easing: 'linear',
    duration: 300,
    translateY: ['5%', '0%'],
    opacity: [0, 1],
    autoplay: false,
    complete: function() {
        about_animation_2.play();
        about_animation_3.play();
    }
})
var about_animation_2 = anime({
    targets: ['.about-body__container h4','.about-body__container p','.about-body__a'],
    easing: 'linear',
    duration: 300,
    translateY: ['5%', '0%'],
    scale: [0.95, 1],
    opacity: [0, 1],
    autoplay: false,
    delay: anime.stagger(200)
})
var about_animation_3 = anime({
    targets: '.about-img img',
    easing: 'linear',
    duration: 400,
    scale: [1, 1.05],
    opacity: [0, 1],
    autoplay: false,
    delay: anime.stagger(200)
})


//splide.js
var splide = new Splide( '.splide', {
    type: 'loop',
    perPage: 1,
    focus: 'center',
    autoplay: true,
    interval: 10000,
    flickMaxPages: 3,
    resetProgress: false,
    updateOnMove: true,
    padding: '10%',
    throttle: 300,
    breakpoints: {
        1440: {
        perPage: 1,
        padding: '10%'
        }
    }
});
splide.mount();

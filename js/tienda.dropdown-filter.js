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
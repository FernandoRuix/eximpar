$(document).ready(function() {
    var tmp_data = [];
    loadtable(tmp_data);

    //CANTIDAD DE REGISTROS MOSTRADOS
    $('.sort--length').click(function(e) {
        e.preventDefault();

        $('.sort--length').removeClass('active');
        $(this).addClass('active');

        $(".sub_length .fa-circle-check").addClass('fa-circle');
        $(".sub_length .fa-circle-check").removeClass('fa-circle-check');
        $(this).find('div i').addClass('fa-circle-check');

        loadtable(tmp_data);
    });

    //ORDEN DE REGISTROS MOSTRADOS
    $('.sort--orderby').click(function(e) {
        e.preventDefault();

        $('.sort--orderby').removeClass('active');
        $(this).addClass('active');

        $(".sub_orderby .fa-circle-check").addClass('fa-circle');
        $(".sub_orderby .fa-circle-check").removeClass('fa-circle-check');
        $(this).find('div i').addClass('fa-circle-check');

        loadtable(tmp_data);
    });

    //PAGINACIÓN
    $(document).on('click', '#pagination button', function () {
        $('html, body').animate({scrollTop:0}, '500');
        $('.current_page').removeClass('current_page');
        $(this).addClass('current_page');
        loadtable(tmp_data);
    });

    //FILTRO PRINCIPAL 
    $('.sort--mainfilter').click(function(e) {
        e.preventDefault();
        $(this).addClass('active');
        var current = $(this).find('i');
        if(current.hasClass("fa-square-check")){
            current.removeClass('fa-square-check');
            current.addClass('fa-square');
            $(this).closest('a').removeAttr("style");
            $(this).removeClass('active');
        } else {
            current.addClass('fa-square-check');
            current.removeClass('fa-square');
        }
        loadtable(tmp_data);
    });

    //FILTRO SECUNDARIO
    var subfilt_arr = [];
    $('.sort--secfilt').click(function(e) {
        e.preventDefault();
        var current_data = $(this).attr("data-secfilter");

        if(!(jQuery.inArray(current_data, subfilt_arr) !== -1)) {
            subfilt_arr.push(current_data);
            $(this).children().removeClass('fa-square');
            $(this).children().addClass('fa-square-check');
            $(this).closest('a').css({"color":"#0033cc"});

            //REMOVE FILTER FROM THIS->MAIN
            /*var main_selector = $(this).closest(".sub_filter").prev().children("a").children("i");
            if(main_selector.hasClass("fa-square-check")){
                main_selector.removeClass('fa-square-check');
                main_selector.addClass('fa-square');
            }*/
        } else {
            subfilt_arr = jQuery.grep(subfilt_arr, function(value) {
                return value != current_data;
            });
            $(this).children().addClass('fa-square');
            $(this).children().removeClass('fa-square-check');
            $(this).closest('a').css({"color":"#0033cc"});
            $(this).closest('a').removeAttr("style");
        }
        tmp_data = subfilt_arr;
        loadtable(tmp_data);
    });

    //SWITCH SORT BY
    $('#switch_sort').click(function(e) {
        e.preventDefault;
        var sort1 = $('.sort--orderby:nth-child(2)');
        var sort2 = $('.sort--orderby:nth-child(3)');
        if (sort1.hasClass('active')) {
            $(".sub_orderby .fa-circle-check").addClass('fa-circle');
            $(".sub_orderby .fa-circle-check").removeClass('fa-circle-check');
            sort1.removeClass('active');
            sort2.addClass('active');
            sort2.children('div').children('i').addClass('fa-circle-check');
            $('.fa-sort-main').removeClass('fa-sort')
            $('.fa-sort-main').removeClass('fa-sort-down')
            $('.fa-sort-main').addClass('fa-sort-up')
        } else {
            $(".sub_orderby .fa-circle-check").addClass('fa-circle');
            $(".sub_orderby .fa-circle-check").removeClass('fa-circle-check');
            $('.sort--orderby').removeClass('active');
            sort1.addClass('active');
            sort1.children('div').children('i').addClass('fa-circle-check');
            $('.fa-sort-main').removeClass('fa-sort-up')
            $('.fa-sort-main').addClass('fa-sort-down')
        }
        loadtable(tmp_data);
    });

    //BUSCAR REGISTROS
    $(".nav-input").submit(function(event){
        event.preventDefault();
        remove_filters();
        loadtable(tmp_data);
    });

    //BORRAR FILTROS
    $('.remove_filters').click(function(e) {
        remove_filters();
        $("#search_input").val('');
        loadtable(tmp_data);
    });

    function loadtable(tmp_data) {
        $(".tienda__main").css({"opacity":"0.2","pointer-events":"none"});
        $.ajax({
            type: "POST",
            url: 'ajax/tienda.ajax.php',
            data: {
                action: 'listRecords',
                length: $(".sub_length .active").attr("data-length"),
                orderby: $(".sub_orderby .active").attr("data-orderby"),
                mainfilter: array_main_filter(),
                secondaryfilter: array_sec_filter(tmp_data),
                search: $('#search_input').val(),
                currentpage: $("#pagination .current_page").attr("data-page")
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                if (!response) {
                    $("#item").html("no se encontro ningun registro");
                } else {
                    var totalItems = response[0].length;
                    var rows = "";
                    for (let z = 0; z < (totalItems); z++) {
                        rows += "<div class='item' id='item'><div class='item-img'>";
                        rows += "<a href='https://www.eximpar.com.py/producto.php?p="+response[0][z]['prd_dbtitulo']+"'><img src='https://www.eximpar.com.py/images/"+response[0][z]['prd_thumb']+"' alt=''></a></div>"; 

                        rows += "<div class='item-info'> <div class='item-info__title'>";
                        rows += "<a href='https://www.eximpar.com.py/producto.php?p="+response[0][z]['prd_dbtitulo']+"'><h4>"+response[0][z]['prd_titulo'];
                        if (response[0][z]['prd_presentacion'] != "") {
                            rows += " • "+response[0][z]['prd_presentacion'];
                        }
                        rows += "</h4></a></div><div class='item-info__tags'>";

                        rows += "<a href=''>"+response[0][z]['mar_titulo']+"</a> • <a href=''>"+response[0][z]['subca_titulo']+"</a>";
                        rows += "</div></div>";
                        rows += "<div class='item-link'><a href='https://www.eximpar.com.py/producto.php?p="+response[0][z]['prd_dbtitulo']+"'><div>VER PRODUCTO</div></a></div></div>";
                    }

                    //PAGINATION
                    var currentActive = $("#pagination .current_page").attr("data-page");
                    let paginationButtons = '';
                    
                    for (let z = 1; z < (Math.ceil( response[1] / $(".sub_length .active").attr("data-length") ))+1; z++) {
                        paginationButtons += '<button data-page="'+z+'">'+z+'</button>';
                    }
                    $('#pagination').html(paginationButtons);

                    if ( currentActive == 1 || typeof currentActive == 'undefined') {
                        $('#pagination button:first-child').addClass('current_page');
                    } else {
                        $("#pagination [data-page="+currentActive+"]").addClass('current_page');
                    }

                    //FINAL-LOAD
                    setTimeout(tableLoad, 400)
                    function tableLoad(){
                        var order = $(".sub_orderby .active").attr("data-orderby");
                        order_txt = clean_orderby(order);
                        $(".button_orderby").html("ORDENAR: "+order_txt);

                        $(".button_length").html(response[0].length+" POR PÁGINA");
                        $("#total_items").html("Mostrando <span>"+response[0].length+"</span> de <span>"+response[1]+"</span> productos");
                        //FINAL LOAD
                        $(".tienda__main").css({"opacity":"1","pointer-events":"auto"});
                        var mainfilter = array_main_filter();
                        $("#products").html(rows);
                    }
                }
            }
        });
    }
    
    //CLEAN ORDERBY
    function clean_orderby(order){
        if (order == "popular") {
            var order_txt = "POPULARIDAD"
        } else if (order == "name_asc") {
            var order_txt = "NOMBRE A - Z"
        } else if (order == "name_desc") {
            var order_txt = "NOMBRE Z - A"
        }
        return order_txt;
    }

    //CLEAN Y AGRUPAR SEC FILTER
    function array_sec_filter(tmp_data){
        if (tmp_data.length === 0) {
            return 'false';
        } else{
            return JSON.stringify(tmp_data);
        }
    }

    //CLEAN Y AGRUPAR FILTRO PRINCIPAL
    function array_main_filter(){
        var fil1 = "false";
        var fil2 = "false";
        var fil3 = "false";
        var fil4 = "false";
        if($('#sort_equ i').hasClass("fa-square-check")){
            fil1 = "equipos";
        }
        if($('#sort_rea i').hasClass("fa-square-check")){
            fil2 = "reactivos";
        }
        if($('#sort_mat i').hasClass("fa-square-check")){
            fil3 = "materiales";
        }
        if($('#sort_sof i').hasClass("fa-square-check")){
            fil4 = "software";
        }
        
		const mainfilter = [fil1,fil2,fil3,fil4];
        return JSON.stringify(mainfilter);
    }

    function remove_filters(){
        //lengh
        $('.sort--length').removeClass('active');
        $('.sub_length .sort--length:nth-child(1)').addClass('active');
        $(".sub_length .fa-circle-check").addClass('fa-circle');
        $(".sub_length .fa-circle-check").removeClass('fa-circle-check');
        $('.sub_length .sort--length:nth-child(1)').find('div i').addClass('fa-circle-check');
        //sort
        $('.sort--orderby').removeClass('active');
        $('.sort--orderby:nth-child(1)').addClass('active');
        $(".sub_orderby .fa-circle-check").addClass('fa-circle');
        $(".sub_orderby .fa-circle-check").removeClass('fa-circle-check');
        $('.sort--orderby:nth-child(1)').find('div i').addClass('fa-circle-check');
        $('.fa-sort-main').removeClass('fa-sort-up')
        $('.fa-sort-main').removeClass('fa-sort-down')
        $('.fa-sort-main').addClass('fa-sort')

        //main
        $('.sort--mainfilter').removeClass('active');
        $('.sort--mainfilter').removeAttr("style");
        $('.sort--mainfilter i').removeClass('fa-square-check');
        $('.sort--mainfilter i').removeClass('fa-square');
        $('.sort--mainfilter i').addClass('fa-square');
        //secondary
        $('.sub_filter--ul li a').removeAttr("style");
        $('.sub_filter--ul li a i').removeClass('fa-square-check');
        $('.sub_filter--ul li a i').removeClass('fa-square');
        $('.sub_filter--ul li a i').addClass('fa-square');
        //pages
        $('.current_page').removeClass('current_page');

        tmp_data = [];
        subfilt_arr = [];
    }




});
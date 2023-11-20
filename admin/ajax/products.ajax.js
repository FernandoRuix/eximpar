$(document).ready(function() {
    load_table();

    //INPUT
    $("#search_input").on("keyup change", function(e) {
        load_table();
    })

    //CANTIDAD DE REGISTROS MOSTRADOS
    $('.sort--length').click(function(e) {
        e.preventDefault();

        $('.sort--length').removeClass('active');
        $(this).addClass('active');

        $(".sub_length .fa-circle-check").addClass('fa-circle');
        $(".sub_length .fa-circle-check").removeClass('fa-circle-check');
        $(this).find('div i').addClass('fa-circle-check');

        load_table();
    });

    //ORDEN DE REGISTROS MOSTRADOS
    $('.sort--orderby').click(function(e) {
        e.preventDefault();

        $('.sort--orderby').removeClass('active');
        $(this).addClass('active');

        $(".sub_orderby .fa-circle-check").addClass('fa-circle');
        $(".sub_orderby .fa-circle-check").removeClass('fa-circle-check');
        $(this).find('div i').addClass('fa-circle-check');

        load_table();
    });

    //BORRAR FILTROS
    $('.remove_filters').click(function(e) {
        remove_filters();
        load_table();
    });

    $(document).on('click', '.switch_stts', function () {
        var item_id = $(this).attr("data-single-id");
        status_change(item_id);
    });

    function status_change(item_id) {
        $.ajax({
            type: "POST",
            url: 'ajax/products.ajax.php',
            data: {
                action: 'status_change',
                prd_id: item_id
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                if (response) {
                    load_table();
                } 
            }
        });
    }

    function load_table() {
        $("tbody").css({"opacity":"0.2","pointer-events":"none"});
        $.ajax({
            type: "POST",
            url: 'ajax/products.ajax.php',
            data: {
                action: 'listProducts',
                length: $(".sub_length .active").attr("data-length"),
                orderby: $(".sub_orderby .active").attr("data-orderby"),
                search: $('#search_input').val()
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                if (!response) {
                    $("tbody").html("no se encontro ningun registro");
                } else {
                    var totalItems = response[0].length;
                    var rows = "";
                    for (let z = 0; z < (totalItems); z++) {
                        rows += "<tr><td class='fst_clm tbl_clm tbl_body'>"+response[0][z]['productos_id']+"</td>";
                        rows += "<td class='scd_clm tbl_clm tbl_body'>"+response[0][z]['prd_titulo']+"</td>"; 
                        rows += "<td class='trd_clm tbl_clm tbl_body'>"+response[0][z]['prd_codigo']+"</td>";
                        rows += "<td class='frt_clm tbl_clm tbl_body'>"+response[0][z]['prd_fecha'].slice(0, 10)+"</td>";
                        if(response[0][z]['prd_activo'] == 1){
                            rows += "<td class='fve_clm tbl_clm tbl_body'><div class='status sts_on switch_stts' data-single-id='"+response[0][z]['productos_id']+"'>Activo</div></td>";
                        } else {
                            rows += "<td class='fve_clm tbl_clm tbl_body'><div class='status sts_off switch_stts' data-single-id='"+response[0][z]['productos_id']+"'>Inactivo</div></td>";
                        }
                        rows += "<td class='six_clm tbl_clm tbl_body'>";
                        rows += "<a href='https://www.eximpar.com.py/admin/products-edit.php?q="+response[0][z]['prd_dbtitulo']+"' class='status sts_act'>Editar</a>";
                        rows += "<a href='' class='status sts_act'>Eliminar</a>";
                        rows += "</td></tr>";
                    }

                    setTimeout(tableLoad, 400)
                    function tableLoad(){
                        $("#total_items").html("Mostrando <span>"+response[0].length+"</span> de <span>"+response[1]+"</span> productos");
                        $("tbody").css({"opacity":"1","pointer-events":"auto"});
                        $("tbody").html(rows);
                        $(".button_length").html(response[0].length+" POR PÁGINA");
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

        $("#search_input").val('');
    }


});
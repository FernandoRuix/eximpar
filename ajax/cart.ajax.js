$(document).ready(function() {

    load_cart();

    //FINALIZAR
    $('#user_data_submit').click(function(e) {
        finish_cart();
    });
    function finish_cart() {

        var submit_missing = true;

        if ($('#user_name').val() == "") {
            var attr = $('#user_name').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_name').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_name').removeAttr("style");
        }

        if ($('#user_lastname').val() == "") {
            var attr = $('#user_lastname').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_lastname').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_lastname').removeAttr("style");
        }

        if ($('#user_ciudad').val() == "") {
            var attr = $('#user_ciudad').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_ciudad').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_ciudad').removeAttr("style");
        }
        
        if ($('#user_dep').val() == "") {
            var attr = $('#user_dep').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_dep').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_dep').removeAttr("style");
        }
        
        if ($('#user_dep').val() == "") {
            var attr = $('#user_dep').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_dep').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_dep').removeAttr("style");
        }
        
        if ($('#user_tel').val() == "") {
            var attr = $('#user_tel').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_tel').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_tel').removeAttr("style");
        }
        
        if ($('#user_mail').val() == "") {
            var attr = $('#user_mail').attr('style');
            if(!(typeof attr !== 'undefined' && attr !== false)) {
                var submit_missing = false;
                $('#user_mail').css({"border":"1px solid #ff0f0f"});
            }
        } else {
            $('#user_mail').removeAttr("style");
        }
        
        var userInfo = [
            $('#user_name').val(),
            $('#user_lastname').val(),
            $('#user_compname').val(),
            $('#user_ciudad').val(),
            $('#user_dep').val(),
            $('#user_tel').val(),
            $('#user_mail').val(),
            $('#user_extrainfo').val()
        ]

        if(submit_missing == true){
            $.ajax({
                type: "POST",
                url: 'ajax/cart.ajax.php',
                data: {
                    action: 'finishOrder',
                    user_info: userInfo
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                dataType : 'json',
                success: function(response){
                    if(response[0] == true){
                        load_cart();
                        window.location.replace("https://www.eximpar.com.py/order-received.php?q="+response[1]+"&key="+response[2]+"");
                    }
                }
            });
        }

    }

    //AÑADIR AL CARRO
    $('#cotizar_button').click(function(e) {
        e.preventDefault();
        add_cart();
    });

    //LIMPIAR CARRO
    $('.info_code').click(function(e) {
        e.preventDefault();
        clear_cart();
    });

    //ELIMINAR UNO DEL CARRO
    $(document).on('click', '.remove_cart', function () {
        var item_id = $(this).attr("data-single-id");
        remove_cart(item_id);
    });

    //UPDATE CARRO
    $('#update_cart').click(function(e) {
        e.preventDefault();
        update_cart();
    });

    //ACCION UPDATE CARRO
    function update_cart() {
        var form_container = [];
        $('.item_qty').each(function(){
            form_container.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: 'ajax/cart.ajax.php',
            data: {
                action: 'updateCart',
                formqty: form_container
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                load_cart();
            }
        });
    }

    //ACCION_ELIMINAR_UNO
    function remove_cart(item_id) {
        $.ajax({
            type: "POST",
            url: 'ajax/cart.ajax.php',
            data: {
                action: 'removeCart',
                id: item_id
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                load_cart();
            }
        });
    }

    //ACCION_AÑADIR_CARRO
    function add_cart() {
        $('#cotizar_button').html("<div class='load-wrapp'> <div class='load-3'> <div class='line'></div> <div class='line'></div> <div class='line'></div> </div> </div>");
        $('#cotizar_button').css({"cursor":"wait"});
        $('#cotizar_button').prop('disabled', true);
        $.ajax({
            type: "POST",
            url: 'ajax/cart.ajax.php',
            data: {
                action: 'addCart',
                id: $("#product_id").val(),
                quantity: $("#product_quantity").val(),
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                setTimeout(addCartTimeOut, 600)
                function addCartTimeOut(){
                    $('#cotizar_button').html('Cotizar');
                    $('#cotizar_button').removeAttr("style");
                    $('#cotizar_button').prop('disabled', false);
                }
                load_cart();
            }
        });
    }

    //ACCION_CLEAR_CARRO
    function clear_cart() {
        $.ajax({
            type: "POST",
            url: 'ajax/cart.ajax.php',
            data: {
                action: 'clearCart'
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                load_cart();
            }
        });
    }

    //ACCION_LOAD_CARRO
    function load_cart() {
        $("#cart-body").css({"opacity":"0.2","pointer-events":"none"});
        $("#main_cart_body").css({"opacity":"0.2","pointer-events":"none"});
        $("#final_cart_list").css({"opacity":"0.2","pointer-events":"none"});
        $.ajax({
            type: "POST",
            url: 'ajax/cart.ajax.php',
            data: {
                action: 'listCart'
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            dataType : 'json',
            success: function(response){
                if (!response[0]) {

                    $("#cart-body").html("<div class='cart-msg'>No se encontro ningun registro</div>");
                    $('.cart_quantity').html(response[1]);

                } else {

                    $('.cart_quantity').html(response[1]);

                    var cart_array = response[0];
                    var rows = "";
                    
                    cart_array.forEach(element => {
                        rows += "<div class='cart-item'><div class='cart-image'> ";
                        rows += "<img src='https://www.eximpar.com.py/images/"+element.item_image+"' alt=''>";
                        rows += "</div> <div class='cart-info'> <div class='cart-info__top'>";
                        rows += "<a href='https://www.eximpar.com.py/producto.php?p="+element.item_dbname+"'>"+element.item_name;
                        if (element.item_presentation != "") {
                            rows += " - "+element.item_presentation;
                        }
                        rows += " - "+element.item_marca+"</a>";
                        rows += "</div> <div class='cart-info__bottom'>";
                        rows += "<span>"+element.item_quantity+" UNID.</span> <span class='remove_cart' data-single-id='"+element.item_id+"'><i class='fa-solid fa-xmark'></i></span> </div> </div> </div>";
                    });

                    setTimeout(cart_load, 400)
                    function cart_load(){
                        $('#cart-body').removeAttr("style");
                        $("#cart-body").html(rows);
                    }

                    //para la pagina cart
                    var main_cart = "";
                    if($('tbody').hasClass('main_cart_body')){

                        cart_array.forEach(element => {
                            main_cart += "<tr>";
                            main_cart += "<td> <button><i class='fa-solid fa-xmark remove_cart id_cont' data-single-id='"+element.item_id+"'></i></button> </td>";
                            main_cart += "<td> <img src='https://www.eximpar.com.py/images/"+element.item_image+"' alt=''> </td>";
                            main_cart += "<td> <a href='https://www.eximpar.com.py/producto.php?p="+element.item_dbname+"'>"+element.item_name;
                            if (element.item_presentation != "") {
                                main_cart += " - "+element.item_presentation;
                            }
                            main_cart += " - "+element.item_marca+" </a></td>";
                            main_cart += "<td><input type='number' class='item_qty' value='"+element.item_quantity+"'></td>";
                            main_cart += "</tr>";
                        });

                        $('#main_cart_body').removeAttr("style");
                        $("#main_cart_body").html(main_cart);

                        if (cart_array.length === 0) {
                            $('#null_alert').html('<div> <h4>Agrega productos para proceder!</h4> </div>');
                            $("#cart_proceed").html("");
                        } else {
                            $('#cart_proceed').html('<a href="" class="cart_href" id="update_cart"><div>ACTUALIZAR COTIZACIÓN</div></a><a href="https://www.eximpar.com.py/checkout.php" class="cart_href"><div>SOLICITAR COTIZACIÓN</div></a>');
                            $("#null_alert").html("");
                        }

                    }

                    //para la pagina checkout
                    var final_cart = "";
                    if($('.final-cart').hasClass('active')){

                        cart_array.forEach(element => {
                            final_cart += "<div class='final-cart__item'>";
                            final_cart += element.item_name;
                            if (element.item_presentation != "") {
                                final_cart += " - "+element.item_presentation;
                            }
                            final_cart += " - "+element.item_marca+" x "+element.item_quantity;
                            final_cart += "</div>";
                        });

                        $('#final_cart_list').removeAttr("style");
                        $("#final_cart_list").html(final_cart);
                    }
                }
            }
        });
    }


});
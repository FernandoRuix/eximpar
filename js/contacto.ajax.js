$(document).ready(function() {

    $(document).on('click','#send_button', function(){
        let nombre = $("#input_name").val();
        let localidad =$("#input_loca").val();
        let mail = $("#input_mail").val();
        let tel = $("#input_tel").val();
        let detalles = $("#input_details").val();
        let validacion = true;

        if (nombre.length === 0){
            $('#input_name').addClass('input_required');
            validacion = false;
        } else {
            $('#input_name').removeClass('input_required'); }

        if (localidad.length === 0){
            $('#input_loca').addClass('input_required');
            validacion = false;
        } else {
            $('#input_loca').removeClass('input_required'); }

        if (mail.length === 0){
            $('#input_mail').addClass('input_required');
            validacion = false;
        } else {
            $('#input_mail').removeClass('input_required'); }

        if (tel.length === 0){
            $('#input_tel').addClass('input_required');
            validacion = false;
        } else {
            $('#input_tel').removeClass('input_required'); }

        if (detalles.length === 0){
            $('#input_details').addClass('input_required');
            validacion = false;
        } else {
            $('#input_details').removeClass('input_required'); }

        let form_data = [nombre, localidad, mail, tel, detalles];

        if(validacion == true){
            $.ajax({
                type: "POST",
                url: "js/contacto.ajax.php",
                data: {
                    action: 'send',
                    form: JSON.stringify(form_data),
                    type: "contacto"
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                dataType: 'text',
                success: function(response){
                    if(response){
                        $("#input_name").val('');
                        $("#input_lastname").val('');
                        $("#input_mail").val('');
                        $("#input_tel").val('');
                        $("#input_emp").val('');
                        $("#input_details").val('');
                        enviado_alert();
                    }
                }
            });
        }
    });

    function enviado_alert(){
        var send_alert_div = `
        <div class="contact_success">
            <div class="contact_success--icon"><i class="fa-solid fa-check"></i></div>
            <div class="contact_success--txt">Enviado Correctamente!</div>
        </div>
        `;
        $('#contact_form').html(send_alert_div);
        setTimeout(function loader_timeout(){
            $('.contact_success').css({'opacity': '1'});
        }, 50);
    }

    $(document).on('click','.map_trigger', function(){
        $('.map_trigger').removeClass('map_trigger--active');
        $('.map_item--body').removeClass('map_item--active');
    
        var map_id = $(this).attr('data-frame-trigger');
    
        $(this).addClass('map_trigger--active');
        $(`[data-frame-id=${map_id}]`).addClass('map_item--active');
    }); 
});
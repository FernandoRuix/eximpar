$(document).ready(function() {

    $(document).on('click','#send_button', function(){
        
        let nombre = $("#input_name").val();
        let apellido =$("#input_lastname").val();
        let mail = $("#input_mail").val();
        let tel = $("#input_tel").val();
        let detalles = $("#input_details").val();
        let ciudad = $("#input_ciu").val();
        let departamento = $("#input_dep").val();
        let validacion = true;

        if (nombre.length === 0){
            $('#input_name').addClass('input_required');
            validacion = false;
        } else {
            $('#input_name').removeClass('input_required'); }
        if (apellido.length === 0){
            $('#input_lastname').addClass('input_required');
            validacion = false;
        } else {
            $('#input_lastname').removeClass('input_required'); }
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
        if (ciudad.length === 0){
            $('#input_ciu').addClass('input_required');
            validacion = false;
        } else {
            $('#input_ciu').removeClass('input_required'); }
        if (departamento.length === 0){
            $('#input_dep').addClass('input_required');
            validacion = false;
        } else {
            $('#input_dep').removeClass('input_required'); }
        if (detalles.length === 0){
            $('#input_details').addClass('input_required');
            validacion = false;
        } else {
            $('#input_details').removeClass('input_required'); }
        let form_data = [nombre, apellido, mail, tel, detalles, ciudad, departamento];

        if(validacion == true){
            $.ajax({
                type: "POST",
                url: "ajax/contacto.ajax.php",
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
                        $("#input_ciu").val('');
                        $("#input_dep").val('');
                        $("#input_details").val('');
                        enviado_alert();
                    }
                }
            });
        }
    });

    function enviado_alert(){
        $("#ctForm").html("<div class='sended'> <div> <h4>ENVIADO CORRECTAMENTE!</h4> <img src='media/check_circle.png' alt=''> </div> </div>");
        setTimeout(tableLoad, 100);
        function tableLoad(){
            $('#ctForm > .sended').addClass('show_sended');
        }
    }

});
$(document).ready(function() {

    $(document).on('click','#send_button', function(){
        let nombre = $("#input_name").val();
        let apellido =$("#input_lastname").val();
        let mail = $("#input_mail").val();
        let tel = $("#input_tel").val();
        let detalles = $("#input_details").val();
        let ciudad = "vacío";
        let departamento = "vacío";
        let validacion = true;

        if (detalles.length === 0){
            $('#input_details').addClass('input_required');
            validacion = false;
        } else {
            $('#input_details').removeClass('input_required'); }

        if (nombre.length === 0 || !(nombre.replace(/\s/g, '').length)) {
            nombre = "vacío";}
        if (apellido.length === 0 || !(apellido.replace(/\s/g, '').length)) {
            apellido = "vacío";}
        if (mail.length === 0 || !(mail.replace(/\s/g, '').length)) {
            mail = "vacío";}
        if (tel.length === 0 || !(tel.replace(/\s/g, '').length)) {
            tel = "vacío";}
        let form_data = [nombre, apellido, mail, tel, detalles, ciudad, departamento];

        if(validacion == true){
            $.ajax({
                type: "POST",
                url: "js/contacto.ajax.php",
                data: {
                    action: 'send',
                    form: JSON.stringify(form_data),
                    type: "sugerencia"
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
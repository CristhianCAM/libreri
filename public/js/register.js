$(document).ready(function(){
    //inicio de registro de usuario

    $("#btn-register").click(function(){
        validator();
    });

    var validator = function(){

        $("#form-register").validate({

            rules:{
                "name": {
                    required:!0,
                },
                "email": {
                    required: !0,
                    email: !0
                },
                "password":{
                    requered:!0,
                    minlength:4,
                },
                "password2":{
                    requered:!0,
                    minlength:4,
                    equalTo: "#password"
                },
            },
            messages:{
                "name":{
                    required:"<b style='color:#5A6268>Por favor completa el campo</b>"
                },
                "email":{
                    required:"<b style='color:#5A6268>Por favor completa el campo</b>",
                    email:"<b style='color:#5A6268>Por favor ingrese un email valido</b>"
                },
                "password":{
                    required:"<b style='color:#5A6268>Por favor completa el campo</b>",
                    minlength:"<b style='color:#5A6268>La contraseña debe tener por lo menos 4 caracteres</b>"
                },
                "password2":{
                    required:"<b style='color:#5A6268>Por favor completa el campo</b>",
                    equalTo:"<b style='color:#5A6268>Las contraseñas no son iguales</b>"
                }
            },

            ignore:[],
            errorClass: "invalid-feedback animated fadeInup",
            errorElement:"div",
            errorPlacement: function(e,a) {
                jQuery(a).parents(".mb-3").append(e);
            },
            highlight: function(e){
                jQuery(e).closest(".mb-3").removeClass("is-invalid").addClass("is-invalid");
            },
            success: function(e){
                jQuery(e).closest(".mb-3").removeClass("is-invalid"), jQuery(e).remove();
            },

            submitHandler: function(form, event){

                event.preventDefault();

                var formData = new FormData($("#form-register")[0]);

                $.ajax({
                    url: base_url + '/register-usuarios',
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData:false,
                    beforSend: function(data) {
                        $('#page-loader').fadeIn('fast');
                    },
                    
                });
            }

        });
    }
});
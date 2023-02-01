
<div class="modal" id="modalLocation" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">

                <div class="content">

                    <div class="auth-content">

                        <div class="auth-text">
                            <h3>Creación de cuenta </h3>
                            <span>Selecciona  el rol de tu cuenta</span>
                        </div>

                        <form class="g-my-10" id="formLogin"  role="form" onSubmit="return false">


                            @csrf

                            <input type="hidden" name="profiles" value="customers" id="customers-radio" class="register-type-radio" >

                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <input type="email" class="input-text with-border" name="email" id="email" placeholder="Dirección de Email" required/>
                            </div>

                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-lock"></i>
                                <input type="password" class="input-text with-border" name="password" id="password" placeholder="Contraseña" required/>
                            </div>

                            <div class="notification error closeable none" id="divNotificationLogin">
                                <p id="textNotificationLogin"></p>
                            </div>


                            <div class="content-button">
                                <button class="button button-settings full-width  ripple-effect " type="submit">Ingresar</button>
                            </div>

                    </form>


                    </div>

                </div>

            </div>


          </div>
        </div>
</div>

@push('scripts')

    <script>

                $(document).ready(function() {

                    loadLocation();

                    function loadLocation() {

                        $('#modalLocation').modal('show');
                        $('#modalLocation').appendTo("body");

                    }




                    jQuery.validator.addMethod("emailExt", function(value, element, param) {
                        return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,3}$/);
                    },'Porfavor ingrese email valido');



                    function loadHeader() {

                        $.ajax({
                            url: "/customer/header",
                            type: "GET",
                            datatype: "html",
                            success: function(data) {
                                $("#header").empty().html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                if (jqXHR.status == 500) {
                                    alert('Internal error: ' + jqXHR.responseText);
                                } else {
                                    alert('Unexpected error.');
                                }
                            }
                        });


                    }


                    $("#formLogin").validate({
                        submit: false,
                        ignore: ":hidden:not(#note),.note-editable.panel-body",
                        rules: {
                            email: {
                                required: true,
                                email: true,
                                emailExt: true
                            },
                            password: {
                                required: true
                            },
                            remember: {
                                required: false
                            }
                        },
                        messages: {
                            email: {
                                required: "Ingresar email",
                                email: "Porfavor ingrese email valido"
                            },
                            password: {
                                required: "La contraseña es obligatoria",
                            }
                        },

                        submitHandler: function(form) {

                            var email =  $("#formLogin").find("input[name='email']").val();
                            var password = $("#formLogin").find("input[name='password']").val();
                            var remember = $("#formLogin").find("input[name='remember']").val();

                                    $.ajax({
                                        url: "/customer/login",
                                        type: "POST",
                                        datatype: "json",
                                        data: {
                                            _token: $('meta[name=csrf-token]').attr('content'),
                                            email : email,
                                            password : password,
                                            remember : remember,
                                        },
                                        success: function(data) {

                                            if(data == "success"){

                                                $('#modalLogin').modal('hide');
                                                $(".modal-backdrop").remove();
                                                loadHeader();
                                                //location.reload();

                                            }else{

                                                $('#divNotificationLogin').removeClass("none");
                                                $('#textNotificationLogin').text(data);

                                                setTimeout(function(){
                                                    $('#divNotificationLogin').text(data);
                                                    $('#divNotificationLogin').addClass("none");
                                                }, 4000);
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            if (jqXHR.status == 500) {
                                                alert('Internal error: ' + jqXHR.responseText);
                                            } else {
                                                alert('Unexpected error.');
                                            }
                                        }
                                    });
                        }
                    });

                });
        </script>

        @endpush


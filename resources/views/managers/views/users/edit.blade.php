@extends('layouts.managers')

@section('content')
    <!-- Content Wrapper -->
    <div class="view-wrapper " >

        <div class="page-content-wrapper">
            <div class="page-content is-relative">

                <div class="page-title has-text-centered">
                    <!-- Sidebar Trigger -->
                    <div data-sidebar="home-sidebar">
                        <span class="menu-toggle has-chevron">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                            </span>
                        </span>
                    </div>

                    <div class="title-wrap">
                        <h1 class="title is-4">Editar usuario</h1>
                    </div>
                    


                </div>

                <div class="page-content-inner">
                    <!--Form Layout 1-->
                    <div class="form-layout">
                        <div class="form-outer">
                            <div class="form-header">
                                <div class="form-header-inner">
                                    <div class="left">

                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <a href="{{ route('manager.users') }}"
                                                class="button h-button is-light is-dark-outlined">
                                                <span class="icon">
                                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                                </span>
                                                <span>Atrás</span>
                                            </a>
                                            <button id="save-button"
                                                class="button h-button is-primary is-raised">Guardar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! Form::open(['route' => ['manager.update.users' , $user->slack], 'method' => 'POST', 'id' => 'formUsers' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                            {{ csrf_field() }}




                            <div class="form-body">

                                <!--Fieldset-->
                                <div class="form-fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Información Usuario</h4>
                                        <p>Complete la información y pulse el boton Guardar para conservar cambios.</p>
                                    </div>


                                    <div class="columns is-multiline">

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Nombres</label>
                                                <div>
                                                    <input type="text" name="firstname" class="input" value="{{ $user->firstname }}" placeholder="" autofocus>
                                                    <label for="firstname" class="error none"></label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Apellidos</label>
                                                <div>
                                                    <input type="text" name="lastname" class="input" value="{{ $user->lastname }}" placeholder="">
                                                    <label for="lastname" class="error none"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Celular</label>
                                                <div>
                                                    <input type="text" name="cellphone" class="input" value="{{ $user->cellphone }}" placeholder="">
                                                    <label for="cellphone" class="error none"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Correo</label>
                                                <div>
                                                    <input type="email" name="email" class="input" value="{{ $user->email }}" placeholder="">
                                                    <label for="email" class="error none"></label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Contraseña</label>
                                                <div>
                                                    <input type="password" name="password" class="input" placeholder="">
                                                    <label for="password" class="error none"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!--selecto box available-->
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Estado</label>
                                                {!! Form::select('available', $availables, $user->available, [
                                                                'class' => 'select2 sortby-select',
                                                                'id' => 'available',
                                                                'required' => 'required',
                                                            ]) !!}
                                                            <label for="available" class="error none"></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {


            $('#date').pickadate({
                format: 'yyyy-mm-dd',
                min: undefined,
                selectMonths: true,
                selectYears: true,
            });

            $("#save-button").on('click', function(e) {
                $('#formUsers').submit();
            });

            jQuery.validator.addMethod("emailExt", function(value, element, param) {
                return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,3}$/);
            }, 'Porfavor ingrese email valido');

            $("#formUsers").validate({
                submit: false,
                ignore: ":hidden:not(#note),.note-editable.panel-body",
                rules: {
                    firstname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    lastname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    cellphone: {
                        required: true,
                        number: true,
                        minlength: 3,
                        maxlength: 10
                    },
                    email: {
                        required: true,
                        email: true,
                        emailExt: true
                    },
                    available: {
                        required: true,
                    },
                    password: {
                        required: false,
                        minlength: 3,
                        maxlength: 50
                    }
                },
                messages: {
                    firstname: {
                        required: "Este campo es necesario.",
                        minlength: "Minimo 3 caracteres",
                        maxlength: "Maximo 50 caracteres"
                    },
                    lastname: {
                        required: "Este campo es necesario.",
                        minlength: "Minimo 3 caracteres",
                        maxlength: "Maximo 50 caracteres"
                    },
                    cellphone: {
                        required: "Este campo es necesario.",
                        number: "Este campo debe ser solo numeros.",
                        minlength: "Minimo 3 caracteres",
                        maxlength: "Maximo 10 caracteres"

                    },
                    email: {
                        required: "Tu correo es obligatorio",
                        email: "Porfavor ingrese correo valido"
                    },
                    available: {
                        required: "Este campo es necesario.",
                    },
                    password: {
                        required: "Este campo es necesario.",

                    },
                }

            });

            $('#categorie').select2({
                placeholder: "Selecciónar",
            });

            $('#available').select2({
                placeholder: "Selecciónar",
            });


        });

    </script>
@endpush

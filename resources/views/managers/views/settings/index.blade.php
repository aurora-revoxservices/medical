@extends('layouts.managers')

@section('content')

<!-- Content Wrapper -->
<div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

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
                    <h1 class="title is-4">Editar Configuración</h1>
                </div>


            </div>

            <div class="page-content-inner">
                <!--Form Layout 1-->
                {!! Form::open(['route' => ['manager.update.settings' , $setting->id], 'method' => 'POST', 'id' => 'formSettings' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                {{ csrf_field() }}


                <textarea style="display: none" id="text-contents" name="content">{{ $setting->about }}</textarea>
                <textarea style="display: none" id="text-missions" name="mission">{{ $setting->mission }}</textarea>
                <textarea style="display: none" id="text-visions" name="vision">{{ $setting->vision }}</textarea>

                <textarea style="display: none" id="text-terms" name="terms">{{ $setting->terms }}</textarea>
                <textarea style="display: none" id="text-politics" name="politic">{{ $setting->politic }}</textarea>
                <textarea style="display: none" id="text-descriptions" name="description">{{ $setting->description }}</textarea>


                <div class="form-layout">
                    <div class="form-outer">
                        <div class="form-header">
                            <div class="form-header-inner">
                                <div class="left">
                                    <h3></h3>
                                </div>
                                <div class="right">
                                    <div class="buttons">
                                        <a href="{{ route('manager.home') }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon">
                                                <i class="lnir lnir-arrow-left rem-100"></i>
                                            </span>
                                            <span>Atrás</span>
                                        </a>
                                        <button id="save-button" type="submit" class="button h-button is-primary is-raised">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <!--Fieldset-->
                            <div class="form-fieldset">
                                <div class="fieldset-heading">
                                    <h4>Información</h4>
                                    <p>Complete la información y pulse el boton Guardar para conservar cambios.</p>
                                </div>

                                <div class="columns is-multiline">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Empresa</label>
                                            <div>
                                                <input type="text" name="label" value="{{ $setting->label }}" class="input" placeholder="">
                                                <label for="label" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Dirección</label>
                                            <div>
                                                <input type="text" name="address" value="{{ $setting->address }}" class="input" placeholder="">
                                                <label for="address" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Número de teléfono</label>
                                            <div>
                                                <input type="text" name="cellphone" value="{{ $setting->cellphone }}" class="input" placeholder="">
                                                <label for="cellphone" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Copyright</label>
                                            <div>
                                                <input type="text" name="copyright" value="{{ $setting->copyright }}" class="input" placeholder="">
                                                <label for="copyright" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <label>Correo</label>
                                            <div>
                                                <input type="email" name="email" value="{{ $setting->email }}" class="input" placeholder="">
                                                <label for="email" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="column is-12">
                                        <div class="field">
                                            <label>Descripción </label>
                                            <div class="control">
                                                <textarea name="description" class="textarea" rows="4" placeholder="Descripcíon de la ofera laboral">{{ $setting->description }}</textarea>
                                            </div>
                                            <label for="description" class="error none"></label>
                                        </div>
                                    </div>

                                </div>


                                <div class="fieldset-heading">
                                    <h4>Social</h4>

                                </div>

                                <div class="columns is-multiline">
                                    <div class="column is-12">
                                        <div class="field">
                                            <label>Empresa</label>
                                            <div>
                                                <input type="text" name="seo" value="{{ $setting->seo }}" class="input" placeholder="">
                                                <label for="label" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Facebook</label>
                                            <div>
                                                <input type="text" name="facebook" value="{{ $setting->facebook }}" class="input" placeholder="">
                                                <label for="facebook" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Linkedin</label>
                                            <div>
                                                <input type="text" name="linkedin" value="{{ $setting->linkedin }}" class="input" placeholder="">
                                                <label for="linkedin" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Twitter</label>
                                            <div>
                                                <input type="text" name="twitter" value="{{ $setting->twitter }}" class="input" placeholder="">
                                                <label for="twitter" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Instagram</label>
                                            <div>
                                                <input type="text" name="instagram" value="{{ $setting->instagram }}" class="input" placeholder="">
                                                <label for="instagram" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Whatsapp</label>
                                            <div>
                                                <input type="text" name="whatsapp" value="{{ $setting->whatsapp }}" class="input" placeholder="">
                                                <label for="whatsapp" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label>Youtube</label>
                                            <div>
                                                <input type="text" name="youtube" value="{{ $setting->youtube }}" class="input" placeholder="">
                                                <label for="youtube" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-fieldset">

                                    <div class="fieldset-heading">
                                        <h4>Informacion</h4>

                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="quill-wrapper">
                                                    <div id="contents">{!! $setting->about !!}</div>

                                                </div>

                                                <label for="contents" class="error none"></label>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-fieldset">

                                    <div class="fieldset-heading">
                                        <h4>Misión</h4>

                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="quill-wrapper">
                                                    <div id="missions">{!! $setting->mission !!}</div>
                                                </div>

                                                <label for="missions" class="error none"></label>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-fieldset">

                                    <div class="fieldset-heading">
                                        <h4>Visión</h4>

                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="quill-wrapper">
                                                    <div id="visions">{!! $setting->vision !!}</div>

                                                </div>

                                                <label for="visions" class="error none"></label>

                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <!--Terminos y condiciones-->
                                <div class="form-fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Terminos y condiciones</h4>

                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="quill-wrapper">
                                                    <div id="terms">{!! $setting->terms !!}</div>
                                                </div>

                                                <label for="terms" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Politicas y privacidad-->
                                <div class="form-fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Politicas de privacidad</h4>

                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="quill-wrapper">
                                                    <div id="politics">{!! $setting->politic !!}</div>
                                                </div>

                                                <label for="politics" class="error none"></label>
                                            </div>
                                        </div>
                                    </div>
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

@endsection

@push('scripts')
<script type="text/javascript">
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        , // custom button values
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }], // superscript/subscript
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }], // add's image support
        ['clean'] // remove formatting button
    ];



    var contents = new Quill('#contents', {

        modules: {
            toolbar: toolbarOptions
        }
        , placeholder: 'Escriba aquí tu descripcion...'
        , theme: 'snow'
    });

    //Avoid Quick Search Toggle
    contents.on('selection-change', function(range, oldRange, source) {

        if (range === null && oldRange !== null) {
            $('body').removeClass('overlay-disabled');
        } else if (range !== null && oldRange === null) {
            $('body').addClass('overlay-disabled');
        }
    });

    contents.on('text-change', function(delta, oldDelta, source) {

        $('#text-contents').val(contents.container.firstChild.innerHTML);


    });

    var missions = new Quill('#missions', {

        modules: {
            toolbar: toolbarOptions
        }
        , placeholder: 'Escriba aquí tu descripcion...'
        , theme: 'snow'
    });

    //Avoid Quick Search Toggle
    missions.on('selection-change', function(range, oldRange, source) {

        if (range === null && oldRange !== null) {
            $('body').removeClass('overlay-disabled');
        } else if (range !== null && oldRange === null) {
            $('body').addClass('overlay-disabled');
        }
    });

    missions.on('text-change', function(delta, oldDelta, source) {

        $('#text-missions').val(missions.container.firstChild.innerHTML);


    });


    var visions = new Quill('#visions', {

        modules: {
            toolbar: toolbarOptions
        }
        , placeholder: 'Escriba aquí tu descripcion...'
        , theme: 'snow'
    });

    //Avoid Quick Search Toggle
    visions.on('selection-change', function(range, oldRange, source) {

        if (range === null && oldRange !== null) {
            $('body').removeClass('overlay-disabled');
        } else if (range !== null && oldRange === null) {
            $('body').addClass('overlay-disabled');
        }
    });

    visions.on('text-change', function(delta, oldDelta, source) {

        $('#text-visions').val(visions.container.firstChild.innerHTML);


    });



    var terms = new Quill('#terms', {
        modules: {
            toolbar: toolbarOptions
        }
        , placeholder: 'Escriba aquí tu descripcion...'
        , theme: 'snow'
    });

    //Avoid Quick Search Toggle
    terms.on('selection-change', function(range, oldRange, source) {
        if (range === null && oldRange !== null) {
            $('body').removeClass('overlay-disabled');
        } else if (range !== null && oldRange === null) {
            $('body').addClass('overlay-disabled');
        }
    });

    terms.on('text-change', function(delta, oldDelta, source) {
        $('#text-terms').val(terms.container.firstChild.innerHTML);
    });


    var politics = new Quill('#politics', {
        modules: {
            toolbar: toolbarOptions
        }
        , placeholder: 'Escriba aquí tu descripcion...'
        , theme: 'snow'
    });

    //Avoid Quick Search Toggle
    politics.on('selection-change', function(range, oldRange, source) {
        if (range === null && oldRange !== null) {
            $('body').removeClass('overlay-disabled');
        } else if (range !== null && oldRange === null) {
            $('body').addClass('overlay-disabled');
        }
    });

    politics.on('text-change', function(delta, oldDelta, source) {
        $('#text-politics').val(politics.container.firstChild.innerHTML);
    });

    $(document).ready(function() {


        $('#date').pickadate({
            format: 'yyyy-mm-dd'
            , min: undefined
            , selectMonths: true
            , selectYears: true
        , });

        $("#save-button").on('click', function(e) {
            $('#formSettings').submit();
        });

        jQuery.validator.addMethod("emailExt", function(value, element, param) {
            return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,3}$/);
        }, 'Porfavor ingrese email valido');

        $("#formSettings").validate({
            submit: false
            , ignore: ":hidden:not(#note),.note-editable.panel-body"
            , rules: {
                label: {
                    required: true
                    , minlength: 3
                    , maxlength: 50
                , }
                , address: {
                    required: true
                    , minlength: 3
                    , maxlength: 50
                , }
                , cellphone: {
                    required: true
                    , number: true
                    , minlength: 3
                    , maxlength: 10
                , }
                , email: {
                    required: true
                    , email: true
                    , emailExt: true
                }
                , copyright: {
                    required: true
                    , minlength: 3,

                }
                , scheduling: {
                    required: true
                    , minlength: 3
                    , maxlength: 200
                , }
                , maps: {
                    required: true
                , seo: {
                    required: false
                , }
                , description: {
                    required: true
                , }
                , about: {
                    required: true
                , }
                , term: {
                    required: true
                , }
                , politic: {
                    required: true
                , }
            }
            , messages: {
                label: {
                    required: "Este campo es necesario."
                    , minlength: "Minimo 3 caracteres"
                    , maxlength: "Maximo 50 caracteres"
                }
                , address: {
                    required: "Este campo es necesario."
                    , minlength: "Minimo 3 caracteres"
                    , maxlength: "Maximo 50 caracteres"
                }
                , cellphone: {
                    required: "Este campo es necesario."
                    , number: "Este campo debe ser solo numeros."
                    , minlength: "Minimo 3 caracteres"
                    , maxlength: "Maximo 10 caracteres"
                }
                , email: {
                    required: "Este campo es necesario."
                , }
                , copyright: {
                    required: "Este campo es necesario."
                , }
                , scheduling: {
                    required: "Este campo es necesario."
                , }
                , maps: {
                    required: "Este campo es necesario."
                , }
                , description: {
                    required: "Este campo es necesario."
                , }
                , about: {
                    required: "Este campo es necesario."
                , }
                , term: {
                    required: "Este campo es necesario."
                , }
                , politic: {
                    required: "Este campo es necesario."
                , }
            }

        });


    });

</script>
@endpush

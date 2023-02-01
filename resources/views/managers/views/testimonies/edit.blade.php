@extends('layouts.managers')

@section('content')
    <!-- Content Wrapper -->
    <div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu"
        data-mobile-item="#home-sidebar-menu-mobile">

        <div class="page-content-wrapper">
            <div class="page-content is-relative">
                <div class="page-title has-text-centered">
                    <!-- Sidebar Trigger -->
                    <div class="" data-sidebar="home-sidebar">
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
                        <h1 class="title is-4">Editar testimonio</h1>
                    </div>
                    



                </div>

                <div class="page-content-inner">


                    {!! Form::open(['route' => ['manager.update.testimonies' , $testimonie->slack], 'method' => 'POST', 'id' => 'formTestimonies' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}

                    <textarea style="display: none" id="text-descriptions" name="description">{{ $testimonie->content }}</textarea>



                    <!--Form Layout 1-->
                    <div class="form-layout">
                        <div class="form-outer">
                            <div class="form-header stuck-header">
                                <div class="form-header-inner">
                                    <div class="left">

                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <a href="{{ route('manager.testimonies') }}"
                                                class="button h-button is-light is-dark-outlined">
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
                                        <h4>Información Testimonio</h4>
                                        <p>Complete la información y pulse el boton Guardar para conservar cambios.</p>
                                    </div>
                                    <div class="columns is-multiline">
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Nombre</title> </label>
                                                <div class="control">
                                                    <input type="text" value="{{ $testimonie->firstname }}" name="firstname" class="input" placeholder="" autofocus>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Apellido</title> </label>
                                                <div class="control">
                                                    <input type="text" value="{{ $testimonie->lastname }}" name="lastname" class="input" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>cargo</title> </label>
                                                <div class="control">
                                                    <input type="text" value="{{ $testimonie->charger }}" name="charger" class="input" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <!--selecto box available-->
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Categoria</label>
                                                {!! Form::select('available', $availables, $testimonie->available, [
                                                                'class' => 'select2 sortby-select',
                                                                'id' => 'available',
                                                                'required' => 'required',
                                                            ]) !!}
                                                            <label for="available" class="error none"></label>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-fieldset">

                                        <div class="fieldset-heading">
                                            <h4>Contenido</h4>
                                            <p>how would you like your demo?</p>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column is-12">
                                                <div class="field">
                                                    <div class="quill-wrapper">
                                                        <div id="descriptions">{!! $testimonie->content !!}</div>
                                                    </div>

                                                    <label for="descriptions" class="error none"></label>
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


        var descriptions = new Quill('#descriptions', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Escriba aquí tu descripcion...',
            theme: 'snow'
        });

        //Avoid Quick Search Toggle
        descriptions.on('selection-change', function(range, oldRange, source) {
            if (range === null && oldRange !== null) {
                $('body').removeClass('overlay-disabled');
            } else if (range !== null && oldRange === null) {
                $('body').addClass('overlay-disabled');
            }
        });

        descriptions.on('text-change', function(delta, oldDelta, source) {
            $('#text-descriptions').val(descriptions.container.firstChild.innerHTML);
        });




        $(document).ready(function() {


            $('#date').pickadate({
                format: 'yyyy-mm-dd',
                min: undefined,
                selectMonths: true,
                selectYears: true,
            });

            $("#save-button").on('click', function(e) {
                $('#formTestimonies').submit();
            });

            $("#formTestimonies").validate({
                submit: false,
                ignore: ":hidden:not(#note),.note-editable.panel-body",
                rules: {
                    firstname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    lastname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    charger: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    content: {
                        required: true,
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
                    charger: {
                        required: "Este campo es necesario.",
                        minlength: "Minimo 3 caracteres",
                        maxlength: "Maximo 50 caracteres"
                    },
                    content: {
                        required: "Este campo es necesario.",
                    }
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

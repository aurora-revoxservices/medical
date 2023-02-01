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
                        <h1 class="title is-4">Editar tag</h1>
                    </div>
                    



                </div>
                <div class="page-content-inner">


                    {!! Form::open(['route' => ['manager.update.tags', $tag->slack], 'method' => 'POST', 'id' => 'formBlogs' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}

                    <!--Form Layout 1-->
                    <div class="form-layout">
                        <div class="form-outer">
                            <div class="form-header ">
                                <div class="form-header-inner">
                                    <div class="left">

                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <a href="{{ route('manager.tags') }}"
                                                class="button h-button is-light is-dark-outlined">
                                                <span class="icon">
                                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                                </span>
                                                <span>Atrás</span>
                                            </a>
                                            <button id="save-button" type="submit"
                                                class="button h-button is-primary is-raised">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">

                                <!--Fieldset-->
                                <div class="form-fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Información Tag</h4>
                                        <p>Complete la información y pulse el boton Guardar para conservar cambios.</p>
                                    </div>
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Titulo</title> </label>
                                                <div class="control">
                                                    <input type="text" name="label" value="{{ $tag->label }}" class="input"  placeholder="" autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Fieldset
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Fecha</title> </label>
                                                <div class="control">
                                                    <input type="text" name="date" value="{{ $tag->date }}" class="input" id="date"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>-->

                                        <!--selecto box estado-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Estado</label>
                                                {!! Form::select('available', $availables,$tag->available, [
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


        $(document).ready(function() {


            $('#date').pickadate({
                format: 'yyyy-mm-dd',
                min: undefined,
                selectMonths: true,
                selectYears: true,
            });

            $("#save-button").on('click', function(e) {
                $('#formBlogs').submit();
            });

            $("#formBlogs").validate({
                submit: false,
                ignore: ":hidden:not(#note),.note-editable.panel-body",
                rules: {
                    label: {
                        required: true,
                    },
                    available: {
                        required: true,
                    }
                },
                messages: {
                    label: {
                        required: "Este campo es necesario.",
                    },
                    available: {
                        required: "Este campo es necesario.",
                    }
                }

            });

            $('#available').select2({
                placeholder: "Selecciónar",
            });


        });
    </script>
@endpush


@extends('layouts.managers')

@section('content')

<!-- Content Wrapper -->
    <div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu"
        data-mobile-item="#home-sidebar-menu-mobile">

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
                        <h1 class="title is-4">Editar Contacto</h1>
                    </div>
                    


                </div>

                <div class="page-content-inner">
                    <!--Form Layout 1-->
                    {!! Form::open(['route' => ['manager.update.contacts', $contact->slack], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                    <div class="form-layout">
                        <div class="form-outer">
                            <div class="form-header">
                                <div class="form-header-inner">
                                    <div class="left">

                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <a href="{{ route('manager.contacts') }}"
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

                            <div class="form-body">
                                <!--Fieldset-->
                                <div class="form-fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Información Mensaje</h4>
                                        <p>Realice el cambio de estado y pulse el boton Guardar para conservar cambios.</p>
                                    </div>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Nombres</label>
                                                <div>
                                                    <input type="text" name="names"
                                                        value="{{ $contact->names }}" class="input" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Número de teléfono</label>
                                                <div>
                                                    <input type="text" name="cellphone" value="{{ $contact->cellphone }}" class="input" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Correo</label>
                                                <div>
                                                    <input type="text" name="email"value="{{ $contact->email }}" class="input" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Fecha de registro</label>
                                                <div>
                                                    <input disabled type="text"
                                                        value="{{ humanize_date($contact->created_at) }}"
                                                        class="input" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Estado</label>
                                                <div class="control">
                                                    {!! Form::select('reviewed', $availables, $available, ['class' => 'select2 sortby-select', 'id' => 'available', 'required' => 'required']) !!}
                                                    <label for="reviewed" class="error none"></label>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Descripción</label>
                                                <div class="control">
                                                    <textarea name="description" class="textarea" rows="4" placeholder="Descripcíon de la ofera laboral" disabled>{{$contact->message}}"</textarea>
                                                </div>
                                                <label for="description" class="error none"></label>
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


@endsection


@push('scripts')
    <script type="text/javascript">
        $('#available').select2({
            placeholder: "Selecciónar un estado",
        });
    </script>
@endpush

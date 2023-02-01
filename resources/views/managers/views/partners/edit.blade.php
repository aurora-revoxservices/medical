@extends('layouts.managers')

@section('content')
<!-- Content Wrapper -->
<div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

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
                    <h1 class="title is-4">Editar aliado</h1>
                </div>




            </div>
            <div class="page-content-inner">


                {!! Form::open([
                'route' => ['manager.update.partners', $partner->slack],
                'method' => 'POST',
                'id' => 'formPartners',
                'files' => true,
                'enctype' => 'multipart/form-data',
                ]) !!}
                {{ csrf_field() }}

                <input type="hidden" id="id" name="id" value="{{ $partner->id }}">
                <input type="hidden" id="slack" name="slack" value="{{ $partner->slack }}">
                <input type="hidden" id="status" name="status" value="true">
                <input type="hidden" id="edit" name="edit" value="true">

                <textarea style="display: none" id="text-descriptions" name="content"></textarea>


                <!--Form Layout 1-->
                <div class="form-layout">
                    <div class="form-outer">
                        <div class="form-header ">
                            <div class="form-header-inner">
                                <div class="left">

                                </div>
                                <div class="right">
                                    <div class="buttons">
                                        <a href="{{ route('manager.partners') }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon">
                                                <i class="lnir lnir-arrow-left rem-100"></i>
                                            </span>
                                            <span>Atrás</span>
                                        </a>
                                        <button id="submit" type="submit" class="button h-button is-primary is-raised">Guardar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">

                            <!--Fieldset-->
                            <div class="form-fieldset">

                                <div class="invoice-logo col-md-12 pt-1 pb-2 mb-md-0">


                                    @if ($thumbnail != null)
                                    <div class="dropzone upload-file text-center py-5 dz-started" id="dropzoneThumbnail">
                                        @else
                                        <div class="dropzone upload-file text-center py-5" id="dropzoneThumbnail">
                                            @endif

                                            <div class="dz-default dz-message">
                                                <button class="btn btn-indigo px-7 mb-2" type="button">
                                                    Buscar Archivo
                                                </button>

                                                <p class="text-heading fs-22 lh-15">Arrastra y suelta la imagen o
                                                </p>

                                                <input type="file" hidden name="file">
                                                <p>Las fotos deben estar en formato JPEG o PNG y al menos 1024 x 768</p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="fieldset-heading">
                                        <h4>Información del integrante</h4>
                                        <p>Complete la información y pulse el boton Guardar para conservar cambios.</p>
                                    </div>
                                    <div class="columns is-multiline">

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Nombre </label>
                                                <div class="control">
                                                    <input type="text" name="label" value="{{ $partner->label }}" class="input" placeholder="" autofocus>



                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Estado</label>
                                                {!! Form::select('available', $availables, $partner->available, [
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
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection



@push('scripts')
<script type="text/javascript">
    Dropzone.autoDiscover = false;

    $(document).ready(function() {


        // Dropzone.options.rentals = false;
        let token = $('meta[name="csrf-token"]').attr('content');

        var myThumbnail = new Dropzone("div#dropzoneThumbnail", {
            paramName: "file"
            , url: "{{ url('/manager/partners/thumbnail') }}"
            , addRemoveLinks: true
            , autoProcessQueue: false
            , uploadMultiple: false
            , acceptedFiles: ".png,.jpg,.jpeg"
            , parallelUploads: 1
            , maxFiles: 1
            , params: {
                _token: token
            },
            // The setting up of the dropzone
            init: function() {


                statuThumbnail = false;

                var myThumbnail = this;

                item = $("#slack").val();

                var path = "{{ asset('pages/img') }}";

                $.getJSON('/manager/partners/get/thumbnail/' + item, function(data) {
                    $.each(data, function(key, value) {
                        var mockFile = {
                            name: value.file
                            , size: value.size
                            , file: value.file
                        };
                        myThumbnail.options.addedfile.call(myThumbnail, mockFile);
                        myThumbnail.options.thumbnail.call(myThumbnail, mockFile
                            , path + "/partners/" + value.file);
                        myThumbnail.options.complete.call(myThumbnail, mockFile);
                        myThumbnail.options.success.call(myThumbnail, mockFile);
                    });
                });

                myThumbnail.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                });

                myThumbnail.on('sending', function(file, xhr, formData) {
                    let partner = document.getElementById('slack').value;
                    formData.append('partner', partner);


                });

                myThumbnail.on("addedfile", function(file) {
                    $("#status").val('false');
                    $('#dropzoneThumbnail').addClass('dz-started');
                });

                myThumbnail.on("removedfile", function(file) {
                    $("#status").val('false');
                    item = file.name;

                    if (item.length > 20) {
                        $.ajax({
                            type: 'GET'
                            , url: '/manager/partners/delete/thumbnail/' + item
                            , success: function(result) {
                                //$('#dropzoneThumbnail').addClass('dz-started');
                            }
                        });
                    }

                });

                myThumbnail.on('resetFiles', function() {
                    $("#status").val('false');
                    myThumbnail.removeAllFiles();
                });


                myThumbnail.on("success", function(file, response) {
                    $("#status").val('true');
                });

                myThumbnail.on("queuecomplete", function() {
                    $("#status").val('true');
                });

                myThumbnail.on("complete", function() {
                    $("#status").val('true');
                    uploadThumbnail();
                });
            }
        });

        $('#submit').on('click', function(event) {

            event.preventDefault();
            upload = false;
            URL = $("#formPartners").attr('action');
            formData = $('#formPartners').serialize();

            var statuThumbnail = $("#status").val();

            $.ajax({
                type: 'POST'
                , url: URL
                , data: formData
                , success: function(result) {
                    if (result.status == "success") {

                        var statuThumbnail = $("#status").val();
                        var partner = result.partner;
                        $("#slack").val(partner);
                        myThumbnail.processQueue();

                        uploadThumbnail();
                    }
                }
            });
        });


        function uploadThumbnail() {

            var statuThumbnail = $("#status").val();
            var statuEdit = $("#edit").val();

            if (statuThumbnail == 'true' && statuEdit == 'true') {
                location.href = "/manager/partners";
            }

        }

        $('.select').select2({
            placeholder: "Selección"
            , minimumResultsForSearch: -1
        });

    });

</script>

<script type="text/javascript">
    $(document).ready(function() {


        $("#formPartners").validate({
            submit: false
            , ignore: ":hidden:not(#note),.note-editable.panel-body"
            , rules: {
                label: {
                    required: true
                    , minlength: 3
                    , maxlength: 50
                , }
                , available: {
                    required: true
                , }
            }
            , messages: {
                label: {

                    required: "Este campo es necesario."
                    , minlength: "Minimo 3 caracteres"
                    , maxlength: "Maximo 50 caracteres"
                }
                , available: {
                    required: "Este campo es necesario."
                }
            , }

        });
        $('#available').select2({
            placeholder: "Selecciónar"
        , });


    });

</script>
@endpush

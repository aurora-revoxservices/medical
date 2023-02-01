@extends('layouts.managers')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content is-relative">

        <div class="page-title has-text-centered">
            <!-- Sidebar Trigger -->
            <div class="huro-hamburger nav-trigger push-resize" data-sidebar="layouts-sidebar">
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
                <h1 class="title is-4">Categorias</h1>
            </div>

            <div class="toolbar ml-auto">



                <div class="toolbar-notifications is-hidden-mobile">
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                        <div class="is-trigger" aria-haspopup="true">
                            <i data-feather="bell"></i>
                            <span class="new-indicator pulsate"></span>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="heading">
                                    <div class="heading-left">
                                        <h6 class="heading-title">Notifications</h6>
                                    </div>
                                    <div class="heading-right">
                                        <a class="notification-link" href="/admin-profile-notifications.html">See all</a>
                                    </div>
                                </div>
                                <ul class="notification-list">
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" />
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Alice C.</span> left a comment.</p>
                                                <p class="time">1 hour ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg" />
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Joshua S.</span> uploaded a file.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/13.jpg" />
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Tara S.</span> sent you a message.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/25.jpg" />
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Melany W.</span> left a comment.</p>
                                                <p class="time">3 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                    <i data-feather="grid"></i>
                </a>
            </div>
        </div>

        <div class="datatable-toolbar">

            <div class="field has-addons is-disabled">

            </div>

            <div class="buttons">
                <a href="{{ route('manager.create.categories') }}" class="button h-button is-primary is-elevated">
                    <span class="icon">
                        <i aria-hidden="true" class="fas fa-plus"></i>
                    </span>
                </a>
            </div>
        </div>

        <div class="page-content-inner">

            <!-- Datatable -->
            <div class="table-wrapper" data-simplebar>
                <table id="users-datatable" class="table is-datatable is-hoverable table-is-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)


                        <tr>

                            @if (strlen($item->label) > 32)
                            <td>{{ substr($item->label, 0, 32) . '...' }}</td>
                            @else
                            <td>{{ $item->label }}</td>
                            @endif

                            <td>
                                @if ($item->available == 1)
                                <span class="tag is-success is-busy is-rounded">Activo</span>
                                @else
                                <span class="tag is-success is-rounded">Inactivo</span>
                                @endif
                            </td>
                            <td>{{ humanize_date($item->created_at) }}</td>
                            <td>
                                <div class="row-action">
                                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                        <div class="is-trigger" aria-haspopup="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <a href="{{ route('manager.edit.categories', $item->slack) }}" class="dropdown-item is-media">


                                                    <div class="icon">
                                                        <i class="lnil lnil-user-alt"></i>
                                                    </div>
                                                    <div class="meta">
                                                        <span>Editar</span>
                                                        <span>Editar item</span>
                                                    </div>
                                                </a>

                                                <hr class="dropdown-divider">
                                                <a class="dropdown-item is-media h-modal-delete" data-modal="delete-modal" data-href="/manager/categories/destroy/" data-slack="{{ $item->slack }}">




                                                    <div class="icon">
                                                        <i class="lnil lnil-trash"></i>
                                                    </div>
                                                    <div class="meta">
                                                        <span>Eliminar</span>
                                                        <span>Eliminar item</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div id="paging-first-datatable" class="pagination datatable-pagination">
                <div class="datatable-info">
                    <span></span>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {


        /*function ellipsis_box(elemento, max_chars) {
            limite_text = $(elemento).text();
            if (limite_text.length > max_chars) {
                limite = limite_text.substr(0, max_chars) + " ...";
                $(elemento).text(limite);
            }
        }
        $(function() {
            ellipsis_box(".limitado", 200);
        });*/



    });

</script>
@endpush


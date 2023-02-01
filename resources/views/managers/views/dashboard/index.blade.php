@extends('layouts.managers')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content is-relative">

        <div class="page-title has-text-centered">
            <!-- Sidebar Trigger -->
            <div class="huro-hamburger nav-trigger push-resize" data-sidebar="home-sidebar">
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
                <h1 class="title is-4">Dashboard</h1>
            </div>

            <div class="toolbar ml-auto">



                <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                    <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                </a>

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

        <div class="page-content-inner">

            <!--Business Dashboard V2-->
            <div class="business-dashboard company-dashboard">

                <div class="company-header is-dark-card-bordered is-dark-bg-6">
                    <div class="header-item is-dark-bordered-12">
                        <div class="item-inner">
                            <i class="lnil lnil-users-alt is-dark-primary"></i>
                            <span class="dark-inverted">{{ count($blogs) }}</span>
                            <p>Blogs</p>
                        </div>
                    </div>
                    <div class="header-item is-dark-bordered-12">
                        <div class="item-inner">
                            <i class="lnil lnil-ticket is-dark-primary"></i>
                            <span class="dark-inverted">{{ count($contacts) }}</span>
                            <p>Contactenos</p>
                        </div>
                    </div>
                    <div class="header-item is-dark-bordered-12">
                        <div class="item-inner">
                            <i class="lnil lnil-briefcase-alt is-dark-primary"></i>
                            <span class="dark-inverted">{{ count($teams) }}</span>
                            <p>Miembros</p>
                        </div>
                    </div>
                    <div class="header-item is-dark-bordered-12">
                        <div class="item-inner">
                            <i class="lnil lnil-ticket is-dark-primary"></i>
                            <span class="dark-inverted">192</span>
                            <p>Active Tickets</p>
                        </div>
                    </div>
                </div>

                <div class="columns is-multiline">



                    <div class="column is-12">
                        <div class="dashboard-card is-tickets">
                            <div class="card-head">
                                <h3 class="dark-inverted">Contatenos Pendientes</h3>
                            </div>

                            <div class="ticket-list">
                                @foreach ($contacts as $contact)

                                <div class="media-flex is-responsive-mobile is-dark-bordered-12">
                                    <div class="h-avatar is-medium">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/31.jpg" alt="" data-user-popover="27">
                                    </div>
                                    <div class="flex-meta">
                                        <span>[#{{ $contact->number }}] - Contactenos </span>
                                        <span>{{ $contact->description }}</span>
                                        <span>{{ humanize_date($contact->created_at) }}</span>
                                    </div>
                                    <div class="flex-end">
                                        <a href="{{ route('manager.edit.contacts', $contact->slack) }}" class="button h-button is-primary is-raised">Gestionar</a>
                                    </div>
                                </div>


                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection


@push('scripts')
@endpush

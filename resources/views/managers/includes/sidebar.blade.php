 <div class="main-sidebar">
     <div class="sidebar-brand">
         <a href="/">
             <img class="light-image" src="/managers/assets/img/logos/logo/logo.svg" alt="">
             <img class="dark-image" src="/managersassets/img/logos/logo/logo-light.svg" alt="">

         </a>
     </div>
     <div class="sidebar-inner">

         <div class="naver"></div>

         <ul class="icon-menu">
             <!-- Activity -->
             <li>
                 <a href="{{ route('manager.dashboard') }}" id="home-sidebar-menu" data-content="Dashboards">

                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                         <rect x="3" y="3" width="7" height="7"></rect>
                         <rect x="14" y="3" width="7" height="7"></rect>
                         <rect x="14" y="14" width="7" height="7"></rect>
                         <rect x="3" y="14" width="7" height="7"></rect>
                     </svg>

                 </a>
             </li> <!-- Layouts -->
             <li>
                 <a href="{{ route('manager.users') }}" id="layouts-sidebar-menu" data-content="Layouts">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     </svg>

                 </a>
             </li> <!-- Bounties -->
             <li>
                 <a href="{{ route('manager.contacts') }}" id="elements-sidebar-menu" data-content="Elements">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                         <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                         <polyline points="22,6 12,13 2,6"></polyline>
                     </svg>



                 </a>
             </li> <!-- Bugs -->
             <li>
                 <a href="{{ route('manager.blogs') }}" id="components-sidebar-menu" data-content="Components">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                         <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                         <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                     </svg>

                 </a>
             </li> <!-- Messaging -->

             <li>
                 <a href="{{ route('manager.categories') }}" id="open-messages" data-content="Messaging">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share">
                         <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                         <polyline points="16 6 12 2 8 6"></polyline>
                         <line x1="12" y1="2" x2="12" y2="15"></line>
                     </svg>

                 </a>
             </li>

             <li>
                 <a href="{{ route('manager.tags') }}" id="open-messages" data-content="Messaging">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                         <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                         <line x1="7" y1="7" x2="7.01" y2="7"></line>
                     </svg>

                 </a>
             </li>

             <li id="">
                 <a href="{{ route('manager.partners') }}" id="open-messages" data-content="Messaging">

                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                         <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                     </svg>
                 </a>
             </li>

             <li>
                 <a href="{{ route('manager.teams') }}" id="open-messages" data-content="Messaging">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                         <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="8.5" cy="7" r="4"></circle>
                         <polyline points="17 11 19 13 23 9"></polyline>
                     </svg>

                 </a>
             </li>

         </ul>

         <!-- User account -->
         <ul class="bottom-menu">

             <li>
                 <a href="{{ route('manager.settings') }}" id="open-settings" data-content="Settings">
                     <i class="sidebar-svg" data-feather="settings"></i>
                 </a>
             </li> <!-- Profile -->
             <li id="user-menu">
                 <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                     <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                     <span class="status-indicator"></span>

                     <div class="dropdown-menu" role="menu">
                         <div class="dropdown-content">
                             <div class="dropdown-head">
                                 <div class="h-avatar is-large">
                                     <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                 </div>
                                 <div class="meta">
                                     <span>Erik Kovalsky</span>
                                     <span>Product Manager</span>
                                 </div>
                             </div>
                             <a href="/admin-profile-view.html" class="dropdown-item is-media">
                                 <div class="icon">
                                     <i class="lnil lnil-user-alt"></i>
                                 </div>
                                 <div class="meta">
                                     <span>Perfil</span>
                                     <span>View your profile</span>
                                 </div>
                             </a>
                             <a href="#" class="dropdown-item is-media">
                                 <div class="icon">
                                     <i class="lnil lnil-cog"></i>
                                 </div>
                                 <div class="meta">
                                     <span>Configuración</span>
                                     <span>Account settings</span>
                                 </div>
                             </a>
                             <hr class="dropdown-divider">
                             <div class="dropdown-item is-button">
                                 <a href="{{ route('logout') }}" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                     <span class="icon is-small">
                                         <i data-feather="log-out"></i>
                                     </span>
                                     <span>Salir</span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </li>



         </ul>
     </div>
 </div>

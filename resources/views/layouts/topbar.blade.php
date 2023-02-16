<div class="overlay"></div>
<div class="search-overlay"></div>

<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('home') }}" class="nav-link">
                    ByTombala
                </a>
            </li>
        </ul>
        <div class="d-lg-flex">
            <ul class="list-unstyled menu-categories" id="topAccordion">
                @hasRole(admin)
                <li class="menu single-menu">
                    <a href="{{ route('back.admin.index') }}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-briefcase mr-2">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Bayi Listesi</span>
                        </div>
                    </a>
                </li>
                <li class="menu single-menu">
                    <a href="{{ route('back.admin.finance') }}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-dollar-sign mr-2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span>Finansal İşlemler</span>
                        </div>
                    </a>
                </li>
                @endRole
                @hasRole(customer)
                <li class="menu single-menu">
                    <a href="{{ route('back.customer.index') }}">
                        <div>
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Müşteri Listesi</span>
                        </div>
                    </a>
                </li>
                <li class="menu single-menu">
                    <a href="{{ route('back.customer.room.index') }}">
                        <div>
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Oyun Odaları</span>
                        </div>
                    </a>
                </li>
                <li class="menu single-menu">
                    <a href="{{ route('back.customer.finance') }}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-dollar-sign mr-2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span>Finansal İşlemler</span>
                        </div>
                    </a>
                </li>
                @endRole
                @hasRole(user)
                <li class="menu single-menu">
                    <a href="{{ route('user.index') }}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Ana Sayfa</span>
                        </div>
                    </a>
                </li>
                <li class="menu single-menu">
                    <a href="{{ route('user.finance') }}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-dollar-sign mr-2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span>Finansal İşlemler</span>
                        </div>
                    </a>
                </li>
                @endRole
                @auth
                    <li class="menu single-menu">
                        <a href="{{ route('bingo.histories') }}">
                            <div>
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>Oyun Geçmişi</span>
                            </div>
                        </a>
                    </li>
                @endauth
            </ul>
            @auth
                <ul class="ml-auto list-unstyled menu-categories">
                    <li class="menu single-menu">
                        <a href="{{ route('profile') }}">
                            <div>
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <b class="text-warning">{{ auth()->user()->username }}</b>
                            </div>
                        </a>
                    </li>
                    <li class="menu single-menu">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                     stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>Çıkış Yap</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endauth
        </div>
    </nav>
</div>


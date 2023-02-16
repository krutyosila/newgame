<div class="header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <div class="nav-logo align-self-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img alt="logo" src="{{ asset('assets/img/logo.png') }}">
                <span class="navbar-brand-name">ByTombala</span>
            </a>
        </div>
        @auth()
            <ul class="navbar-item flex-row nav-dropdowns ml-auto">
                <li class="nav-item">
                    <div class="btn-group">
                    @if(auth()->user()->role != 'admin')
                        <a href="javascript:void(0);" class="btn btn-secondary">
                            <b>{{ auth()->user()->balance }}₺</b>
                        </a>
                    @endif
                    </div>
                </li>
            </ul>
        @endauth
    </header>
</div>

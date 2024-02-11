<header class="header-area style-1 dashboard-header" style="
background-color: var(--white-color);">
    <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
        <div class="mobile-logo-wrap">
            <a href="{{ route('user.dashboard') }}"><img src="{{asset('front/img/orka-group-logo.svg')}}"></a>
        </div>
    </div>
    <div class="main-menu">
        <ul class="menu-list">
            <li class="menu-item-has-children">
                <a href="javascript:void(0);" class="drop-down" style="color:#000;">{{ App::getLocale() }}</a>
                <i class="bi bi-plus dropdown-icon"></i>
                <ul class="sub-menu">
                    @foreach ($languages as $lang)
                        @php if (App::getLocale() == $lang->s_code) continue; @endphp
                        <li><a href="{{ route('lang', $lang->s_code) }}">{{ $lang->s_code }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</header>
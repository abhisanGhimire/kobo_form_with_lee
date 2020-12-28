<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show __web-inspector-hide-shortcut__" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        {{ config('app.name', 'Kobo Visualization') }}
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home',app()->getlocale()) }}">
                {{ __('sidebar.dashboard_home') }}
            </a>
        </li>


        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home.kobodatatable',app()->getlocale()) }}">
            View All Information
            </a>
        </li>

        {{-- <li class="c-sidebar-nav-item">
            <span class="c-sidebar-nav-link">{{ __('sidebar.language_select') }}
                <div>
                    <a href="{{ route(Route::currentRouteName(),'in') }}" class="float-right ml-2"><img
                            src="{{ asset('language_assets/in.svg') }}" height="25"></a>
                    <a href="{{ route(Route::currentRouteName(),'en') }}" class="float-right ml-2"> <img
                            src="{{ asset('language_assets/en.svg') }}" height="25"></a>
                </div>
            </span>
        </li> --}}

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout',app()->getlocale()) }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{__('sidebar.logout')}}
            </a>
        </li>

    </ul>
</div>
<form id="logout-form" action="{{ route('logout',app()->getlocale()) }}" method="POST" class="d-none">
    @csrf
</form>

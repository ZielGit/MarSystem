<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="https://www.mar.com.pe/" class="app-brand-link" target="_blank">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/logo-mar-srl.png') }}" width="195" alt="" srcset="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <x-jet-nav-link :active="request()->routeIs('dashboard')">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i> {{ __('Dashboard') }}
            </a>
        </x-jet-nav-link>
        <!-- Users -->
        <x-jet-nav-link :active="request()->routeIs('users.*')">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i> {{ __('Users') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('customers.*')">
            <a href="{{ route('customers.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-business'></i> {{ __('Customers') }}
            </a>
        </x-jet-nav-link>
    </ul>
</aside>
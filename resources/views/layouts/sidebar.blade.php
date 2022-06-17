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
                <i class="menu-icon tf-icons bx bxs-dashboard"></i> {{ __('Dashboard') }}
            </a>
        </x-jet-nav-link>
        <!-- Users -->
        <x-jet-nav-link :active="request()->routeIs('users.*')">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i> {{ __('Users') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('branch.offices.*')">
            <a href="{{ route('branch.offices.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-home'></i> {{ __('Branch Offices') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('customers.*')">
            <a href="{{ route('customers.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-business'></i> {{ __('Customers') }}
            </a>
        </x-jet-nav-link>
        <x-nav-link-toggle :active="request()->routeIs('products.*', 'product.types.*')">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-package"></i> {{ __('Manage Products') }}
            </a>
            <ul class="menu-sub">
                <x-jet-nav-link :active="request()->routeIs('products.*')">
                    <a href="{{ route('products.index') }}" class="menu-link">
                        {{ __('Products') }}
                    </a>
                </x-jet-nav-link>
                <x-jet-nav-link :active="request()->routeIs('product.types.*')">
                    <a href="{{ route('product.types.index') }}" class="menu-link">
                        {{ __('Types') }}
                    </a>
                </x-jet-nav-link>
            </ul>
        </x-nav-link-toggle>
        <x-jet-nav-link :active="request()->routeIs('providers.*')">
            <a href="{{ route('providers.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-truck'></i> {{ __('Providers') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('gatherings.*')">
            <a href="{{ route('gatherings.index') }}" class="menu-link">
                <i class="tf-icons fa-solid fa-people-carry-box me-2"></i> {{ __('Gathering') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('drivers.*')">
            <a href="{{ route('drivers.index') }}" class="menu-link">
                <i class="fa-solid fa-users me-2"></i> {{ __('Drivers') }}
            </a>
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('travels.*')">
            <a href="{{ route('travels.index') }}" class="menu-link">
                <i class="fa-solid fa-truck-fast me-2"></i> {{ __('Travels') }}
            </a>
        </x-jet-nav-link>
    </ul>
</aside>
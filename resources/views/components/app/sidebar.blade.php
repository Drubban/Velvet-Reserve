<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex align-items-center m-0"
            href="https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html" target="_blank">
            <span class="font-weight-bold text-lg">Corporate UI</span>
        </a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('sucursales.*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#sucursalesMenu" role="button"
                    aria-expanded="{{ request()->routeIs('sucursales.*') ? 'true' : 'false' }}"
                    aria-controls="sucursalesMenu">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="#FFFFFF"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Sucursales</span>
                </a>
                <div class="collapse {{ request()->routeIs('sucursales.*') ? 'show' : '' }}" id="sucursalesMenu">
                    <ul class="nav ms-4 ps-2 flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('sucursales.index') ? 'active' : '' }}"
                                href="{{ route('sucursales.index') }}">
                                Ver todas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('sucursales.create') ? 'active' : '' }}"
                                href="{{ route('sucursales.create') }}">
                                Agregar nueva
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('reservaciones.*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#reservationsMenu" role="button"
                    aria-expanded="{{ request()->routeIs('reservaciones.*') ? 'true' : 'false' }}"
                    aria-controls="reservationsMenu">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 5h18M3 12h18M3 19h18" stroke="#FFFFFF" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Reservaciones</span>
                </a>
                <div class="collapse {{ request()->routeIs('reservaciones.*') ? 'show' : '' }}" id="reservationsMenu">
                    <ul class="nav ms-4 ps-2 flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('reservaciones.index') ? 'active' : '' }}"
                                href="{{ route('reservaciones.index') }}">
                                Ver todas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('reservaciones.show') ? 'active' : '' }}"
                                href="{{ route('reservaciones.show', ['id' => 1]) }}">
                                Ver individual
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('clientes.*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                    href="#clientesMenu" role="button"
                    aria-expanded="{{ request()->routeIs('clientes.*') ? 'true' : 'false' }}"
                    aria-controls="clientesMenu">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4a4 4 0 100 8 4 4 0 000-8zM12 14c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8z"
                                stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Clientes</span>
                </a>
                <div class="collapse {{ request()->routeIs('clientes.*') ? 'show' : '' }}" id="clientesMenu">
                    <ul class="nav ms-4 ps-2 flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('clientes.index') ? 'active' : '' }}"
                                href="{{ route('clientes.index') }}">
                                Ver todos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('clientes.show') ? 'active' : '' }}"
                                href="{{ route('clientes.show', ['id' => 1]) }}">
                                Ver detalles
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('salones.*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                    href="#salonesMenu" role="button"
                    aria-expanded="{{ request()->routeIs('salones.*') ? 'true' : 'false' }}"
                    aria-controls="salonesMenu">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 7l9-4 9 4M21 17l-9 4-9-4M3 7v10l9 4 9-4V7" stroke="#FFFFFF" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Salones y Mesas</span>
                </a>
                <div class="collapse {{ request()->routeIs('salones.*') ? 'show' : '' }}" id="salonesMenu">
                    <ul class="nav ms-4 ps-2 flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('salones.index') ? 'active' : '' }}"
                                href="{{ route('salones.index') }}">
                                Ver todos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('salones.create') ? 'active' : '' }}"
                                href="{{ route('salones.create') }}">
                                Agregar salón
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('tipos-reservacion.*') ? 'active' : '' }}"
                    href="{{ route('tipos-reservacion.index') }}">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"
                                stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Tipos de Reservación</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

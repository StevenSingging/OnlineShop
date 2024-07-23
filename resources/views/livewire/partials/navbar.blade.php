<div>
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href=".">
                    <img src="{{asset('theme/static/logo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
           
            <div class="navbar-nav flex-row order-md-last">
                @if(auth()->user()->role == "User")
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <a wire:navigate href="/cart" class="btn">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17h-11v-14h-2" />
                                    <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                            Cart
                            <span class="badge bg-green text-blue-fg ms-2">{{ $total_count }}</span>
                        </a>    
                    </div>
                </div>
                @endif
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('theme/static/avatars/000m.jpg')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{auth()->user()->name}}</div>
                            <div class="mt-1 small text-secondary">{{auth()->user()->role}}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        @if(auth()->user()->role == "User")
                        <a href="/my-orders" class="dropdown-item">My Order</a>
                        @endif
                        <a href="/logout" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
           
            
        </div>
    </header>
</div>

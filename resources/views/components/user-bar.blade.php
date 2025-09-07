<nav class="navbar navbar-expand-lg text-bg-primary pe-4 ps-4">
        <div class="container-fluid ">
{{--            <button--}}
{{--                class="navbar-toggler"--}}
{{--                type="button"--}}
{{--                data-bs-toggle="collapse"--}}
{{--                data-bs-target="#navbarNavd"--}}
{{--                aria-controls="navbarNav"--}}
{{--                aria-expanded="false"--}}
{{--                aria-label="Toggle navigation"--}}
{{--            >--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#atSidebar" aria-controls="bd Sidebar" aria-label="Toggle docs navegation"><span class="navbar-toggler-icon"></span></button>

            <a class="navbar-brand" href="{{ route('home') }}">Agendamento-Onlyne</a>
            <div class="d-flex justify-items-end align-items-center pe-4" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Editar perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.profile.password') }}">Alterar senha</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
</nav>


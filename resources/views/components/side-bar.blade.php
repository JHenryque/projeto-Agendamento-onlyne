<aside class="col-md-2 text-bg-dark" id="navbarNavd">
    <div class="offcanvas-lg offcanvas-start text-bg-dark" tabindex="-1" id="atSidebar" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
{{--            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>--}}
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#atSidebar"></button>
        </div>


    <div class="offcanvas-body">

        <div class="d-flex flex-column mt-5 navbar-collapse collapse-horizontal">
            <div class="d-flex flex-column align-self-center p-1">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home me-3"></i>Home</a>
                @can('admin')
                    <a href="{{ route('colaboration') }}" class="nav-link mt-4"><i class="fa-solid fa-people-group me-3"></i>Colaboradores</a>
                @endcanany
                @can('colaborator')
                    <a href="{{ route('empreendedor') }}" class="nav-link mt-4"><i class="fa-solid fa-chalkboard-user me-3"></i>Empreendedor</a>
                @endcan
                @can('empreendedor')
                    <a href="#" class="nav-link mt-4"><i class="fa-solid fa-calendar me-3"></i>Atendimento</a>
                    <a href="#" class="nav-link mt-4"><i class="fa-solid fa-business-time me-3"></i>Horario</a>
                @endcan
                <a href="{{ route('user.profile') }}" class="nav-link mt-4"><i class="fa-solid fa-user-gear me-3"></i>Editar perfil</a>

            </div>
            <hr>
            <div class="text-center">

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-3"></i> Sair
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</aside>




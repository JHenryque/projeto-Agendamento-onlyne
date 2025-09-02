<aside class="col-md-2 text-bg-dark" id="navbarNavd">
    <div class="d-flex flex-column mt-5 navbar-collapse collapse-horizontal">
        <div class="d-flex flex-column align-self-center p-1">

              <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home me-3"></i>Home</a>
                @can('admin')
                    <a href="{{ route('colaboration') }}" class="nav-link mt-4"><i class="fa-solid fa-people-group me-3"></i>Colaboradores</a>
                @endcanany
                @can('colaborator')
                    <a href="{{ route('empreendedor') }}" class="nav-link mt-4"><i class="fa-solid fa-chalkboard-user me-3"></i>Empreendedor</a>
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
</aside>



<aside class="col-md-2 text-bg-dark">
    <div class="d-flex flex-column mt-5">
        <div class="d-flex flex-column align-self-center p-1">
            <a href="{{ route('home') }}"><i class="fas fa-home me-3"></i>Home</a>
            @can('admin')
                 <a href="#" class="mt-4"><i class="fa-solid fa-people-group me-3"></i>Colaborador</a>
            @endcanany
            <a href="#" class="mt-4"><i class="fa-solid fa-chalkboard-user me-3"></i></i>Empreendedor</a>
            <a href="{{ route('user.profile') }}" class="mt-4"><i class="fa-solid fa-user-gear me-3"></i>Editar perfil</a>
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



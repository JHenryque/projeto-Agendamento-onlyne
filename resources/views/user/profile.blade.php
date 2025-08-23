<x-layout-app title="Editar Perfil">
    <div class="bg-light p-2">
        <h3>Edite Perfil</h3>
        <hr>
        <x-profile-user/>
        <hr>

        @if(session('success'))
            <div class="alert bg-success alert-dismissible text-center fade show" role="alert">
                <strong class="text-center">{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert bg-danger alert-dismissible text-center fade show" role="alert">
                <strong class="text-center">Ops aconteceu um Error! :(</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-center p-5">
                <form action="{{ route('user.profile.update') }}" method="post" class="form-floating col-md-8">
                    @csrf

                    <x-formulario-input/>

                    <button type="submit" class="btn btn-outline-primary mt-3 col-md-10">Alterar perfil</button>
                </form>

            </div>
        </div>
    </div>
</x-layout-app>

<x-layout-app title="Delete Empreendedor">
    <div class="container-fluid text-bg-light h-100 p-5">
        <h3 class="text-primary">Delete Empreededor</h3>
        <hr>
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-5">

                <div class="card p-4 text-center">

                    <p>Tem certeza de que deseja excluir este Empreendedor?</p>

                    <div class="text-center">
                        <h3 class="my-4">{{ $user->name }}</h3>
                        <div class="d-flex flex-row justify-content-center gap-4">
                            <a href="{{ route('empreendedor') }}" class="btn btn-sm btn-outline-primary">Não</a>
                            <a href="{{ route('empreendedor.destroy.empreendedores', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-danger">Sim</a>
                        </div>
                        <p class="my-4">{{ $user->email }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout-app>


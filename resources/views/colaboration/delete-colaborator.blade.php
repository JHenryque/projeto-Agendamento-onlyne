<x-layout-app title="Delete Colaborator">
    <div class="container-fluid text-bg-light h-100 p-5">
                <h3 class="text-primary">Delete colaborator</h3>
                <hr>
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-7">

                <div class="card p-4 text-center">

                    <p>Tem certeza de que deseja excluir este colaborador?</p>

                    <div class="text-center">
                        <h3 class="my-4">{{ $colaborator->name }}</h3>
                        <a href="{{ route('colaboration') }}" class="btn btn-sm btn-outline-primary">Não</a>
                        <a href="#" class="btn btn-sm btn-outline-danger">Sim</a>
                        <p class="my-4">{{ $colaborator->email }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout-app>

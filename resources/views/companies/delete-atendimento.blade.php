<x-layout-app title="Delete Tipo Atendimnto">
    <div class="container-fluid text-bg-light h-100 p-2">
        <h3 class="text-bg-primary p-2">Deletar Tipo atendimento</h3>
        <hr>
        <x-profile-client/>
        <hr>
        <div class="d-flex justify-content-center  h-50">
            <div class="col-md-5 align-content-center">

                <div class="card p-4 text-center">

                    <p>Tem certeza de que deseja excluir Tipo de Atendimento?</p>

                    <div class="text-center">
                        <h3 class="my-4">{{ $aten->name }}</h3>
                        <div class="d-flex flex-row justify-content-center gap-4 ">
                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="window.history.back()">Não</button>
                            <a href="{{ route('client.destroy.atendimento', ['id'=> $aten->id]) }}" class="btn btn-sm btn-outline-danger">Sim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-app>

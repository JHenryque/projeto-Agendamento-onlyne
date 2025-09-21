<x-layout-app title="Home">
    <div class="container-fluid text-bg-light h-100">
        <div class="row p-1">
            <x-profile-user/>
            <hr class="mt-3">
        </div>

        <div class="row col-lg-12 justify-content-center my-3">


            <div class="col-lg-10 mb-5 table-responsive">

                @if($idCol)
                <table class="table table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Active</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Data - Hora</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($colaborators as $colaborator)
                            @if($colaborator->col_id === auth()->user()->id)
                            <tr>
                                <th scope="row">{{ $colaborator->id }}</th>
                                <td>{{ $colaborator->name }}</td>
                                <td>{{ $colaborator->email }}</td>
                                <td>
                                    @empty($colaborator->email_verified_at)
                                        <div class="badge bg-danger">Não</div>
                                    @else
                                        <div class="badge bg-success">Sim</div>
                                    @endempty
                                </td>
                                <td>{{ $colaborator->empreendedor->phone }}</td>
                                <td>{{ $colaborator->empreendedor->cidade }}</td>
                                <td>{{ $colaborator->empreendedor->created_at->format('d/m/Y - H:i:s') }}</td>
                            </tr>
                            @endif

                         @endforeach
                    </tbody>

                </table>
                @else
                    <p class="text-dark-emphasis text-center fs-3 my-3">Ainda vc nao cadastrador empreendedor</p>
                @endif
            </div>

        </div>
    </div>
</x-layout-app>

<x-layout-app title="Home">
    <div class="container-fluid text-bg-light">
        <div class="row p-1">
            <h3 class="text-primary">Home</h3>
            <hr>
            <x-profile-user/>
            <hr>
        </div>

        <div class="row col-lg-12 justify-content-center">


            <div class="col-lg-10 mb-5 table-responsive">

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
                        <th></th>
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
                                <td>
                                        <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">
                                            @if($colaborator->role != 'admin')
                                                <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            @endif
                                        </div>
                                </td>
                            </tr>
                            @endif

                         @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-layout-app>

<x-layout-app title="Colaboradores">
    <div class="container-fluid text-bg-light h-100">
        <h3 class="text-primary">Colaboradores</h3>
        <hr>
        <x-profile-user />
        <hr>
        <div class="my-5">
            <a href="{{ route('colaboration.create.colaborator') }}" class="btn btn-outline-primary ms-5">Criar novo Colaborador</a>
        </div>

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

        <div class="row col-lg-12 justify-content-center">
            @if($colaborators->count() === 0)
                <div class="text-center my-5 text-info">
                    <p class="display-6">Não existe colaborador</p>
                    <a href="{{ route('colaboration.create.colaborator') }}" class="btn btn-primary">Criar novo Colaborador</a>
                </div>

            @else
               <div class="col-lg-10 mb-5 table-responsive">
                   <table class="table table-hover">
                       <thead class="table-dark">
                       <tr>
                           <th scope="col">#</th>
                           <th>Nome</th>
                           <th>E-mail</th>
                           <th>Active</th>
                           <th>Department</th>
                           <th>Telefone</th>
                           <th>Cidade</th>
                           <th></th>
                       </tr>
                       </thead>

                       <tbody>

                       @foreach($colaborators as $colaborator)
                           <tr>
                               <th scope="row">{{ $colaborator->id }}</th>
                               <td>{{ $colaborator->name }}</td>
                               <td>{{ $colaborator->email }}</td>
                               <td>
                                   @empty($colaborator->email_verified_at)
                                       <div class="badge bg-danger">No</div>
                                   @else
                                       <div class="badge bg-success">Yes</div>
                               @endempty
                               <td>{{ $colaborator->role }}</td>
                               <td>{{ $colaborator->adresses->phone }}</td>
                               <td>{{ $colaborator->adresses->cidade }}</td>

                               <td>
                                   @can('admin')
                                       <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">

                                            @if($colaborator->role != 'admin')
                                                @if(empty($colaborator->deleted_at))
                                                   <a href="{{ route('colaboration.edit.colaborator', ['id' => $colaborator->id]) }}" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                                                   <a href="{{ route('colaboration.delete.colaborator', ['id' => $colaborator->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                   <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                               @else
                                                   <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                                   <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-arrow-up me-2"></i></a>
                                               @endif
                                           @endif

                                       </div>
                                   @endcan
                               </td>
                           </tr>
                       @endforeach

                       </tbody>
                   </table>
               </div>
            @endif
        </div>
    </div>
</x-layout-app>

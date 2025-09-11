<x-layout-app title="Empreededor">
   <div class="container-fluid w-100 h-100 text-bg-light p-5">
       <h3 class="text-primary">Empreededor</h3>
       <hr>
       <x-profile-user />
       <hr>

       @if(session('success'))
           <div class="alert bg-success alert-dismissible text-center fade show" role="alert">
               <strong class="text-center">{{ session('success') }}</strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
       @endif

       @if($errors->any())
           <div class="alert bg-danger alert-dismissible text-center fade show" role="alert">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
       @endif



       <div class="row col-lg-12 justify-content-center">
           @if($users->count() === 0)
               <div class="text-center my-5 text-info">
                   <p class="display-6">Não existe Empreendedor</p>
                   <a href="{{ route('empreendedor.create.empreendedores') }}" class="btn btn-primary"><i class="fas fa-plus me-3 text-bg-dark p-1 rounded"></i> Empreendedor</a>
               </div>

           @else
               <div class="col-lg-10 mb-5 table-responsive">

               <div class="my-5 float-end">
                   <a href="{{ route('empreendedor.create.empreendedores') }}" class="btn btn-outline-primary ms-5"><i class="fas fa-plus me-2 text-bg-dark p-1 rounded"></i> Empreendedor</a>
               </div>

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
                           @can('admin')<th>Vendedor</th>@endcan
                           <th></th>
                       </tr>
                       </thead>

                       <tbody>

                       @foreach($users as $user)
                           <tr>
                               <th scope="row">{{ $user->id }}</th>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->email }}</td>
                               <td>
                                   @empty($user->email_verified_at)
                                       <div class="badge bg-danger">Não</div>
                                   @else
                                       <div class="badge bg-success">Sim</div>
                               @endempty
                               <td>{{ $user->role }}</td>
                               <td>{{ $user->empreendedor->phone }}</td>
                               <td>{{ $user->empreendedor->cidade }}</td>

                               @can('admin')
                                   <td>
                                       @foreach($cols as $col)
                                            @if($user->col_id === $col->id)
                                                {{ $col->name }}
                                            @endif
                                       @endforeach
                                    </td>
                               @endcan

                               <td>
                                   @can('admin')
                                       <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">

                                           @if($user->role != 'admin')
                                               @if(empty($user->deleted_at))
                                                   <a href="{{ route('empreendedor.edit.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                                                   <a href="{{ route('empreendedor.delete.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                   <a href="{{ route('empreendedor.details.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                               @else
                                                   <a href="{{ route('empreendedor.restore.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-arrow-up pe-1"></i></a>
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

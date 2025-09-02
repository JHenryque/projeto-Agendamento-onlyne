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
           @if($empreendedores->count() === 0)
               <div class="text-center my-5 text-info">
                   <p class="display-6">Não existe Empreendedor</p>
                   <a href="{{ route('empreendedor.create.empreendedores') }}" class="btn btn-primary">Criar novo Empreendedor</a>
               </div>

           @else
               <div class="my-5">
                   <a href="{{ route('empreendedor.create.empreendedores') }}" class="btn btn-outline-primary ms-5">Criar novo Empreendedor</a>
               </div>
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

                       @foreach($empreendedores as $empreendedor)
                           <tr>
                               <th scope="row">{{ $empreendedor->id }}</th>
                               <td>{{ $empreendedor->name }}</td>
                               <td>{{ $empreendedor->email }}</td>
                               <td>
                                   @empty($empreendedor->email_verified_at)
                                       <div class="badge bg-danger">Não</div>
                                   @else
                                       <div class="badge bg-success">Sim</div>
                               @endempty
                               <td>{{ $empreendedor->role }}</td>
                               <td>{{ $empreendedor->adresses->phone }}</td>
                               <td>{{ $empreendedor->adresses->cidade }}</td>

                               <td>
                                   @can('admin')
                                       <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">

                                           @if($empreendedor->role != 'admin')
                                               @if(empty($empreendedor->deleted_at))
                                                   <a href="#" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                                                   <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                                               @else
                                                   <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-arrow-up pe-1"></i></a>
                                               @endif
                                               <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
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

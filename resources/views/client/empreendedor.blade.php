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

                       <x-tbody-empreendedor :users="$users" :cols="$cols"/>

                       </tbody>
                   </table>
               </div>
           @endif
       </div>
   </div>
</x-layout-app>

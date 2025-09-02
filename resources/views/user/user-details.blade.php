<x-layout-app title="Detalis Usuarios">
    <div class="container-fluid p-4 text-bg-light h-100 w-100">
        <h3 class="text-primary">Detalis Usuario</h3>
        <hr>
        <div class="row flex-column col-md-6 p-5">
            <div class="justify-self-center">
                <p>Name: <strong>{{ $user->name }}</strong></p>
                <p>Email: <strong>{{ $user->email }}</strong></p>
                <p>Role: <strong>{{ $user->role }}</strong></p>
                <p>Permissions: </p>

                @php
                    $permissions = json_decode($user->permissions)
                @endphp

                    <!-- permissions -->
                <ul>
                    @foreach($permissions as $permission)
                        <li>{{ $permission }}</li>
                    @endforeach
                </ul>

                <p>Departmento: <strong>{{ $user->department->name ?? " - " }}</strong></p>

                <div>Active:
                    @empty($user->email_verified_at)
                        <p class="badge bg-danger"> No</p>
                    @else
                        <p class="badge bg-success"> Yes</p>
                    @endempty
                </div>
            </div>


            <div class="col">
                <p>Telefone: <strong>{{ $user->adresses->phone }}</strong></p>
                <p>Endereço: <strong>{{ $user->adresses->address }}</strong></p>
                <p>N°: <strong>{{ $user->adresses->number }}</strong></p>
                <p>Bairro: <strong>{{ $user->adresses->bairro }}</strong></p>
                <p>Cidade: <strong>{{ $user->adresses->cidade }}</strong></p>
                <p>CEP: <strong>{{ $user->adresses->cep }} $</strong></p>
            </div>
            <button class="btn btn-outline-dark " onclick="window.history.back()"><i class="fas fa-arrow-left me-2"></i>Back</button>
        </div>
    </div>


</x-layout-app>

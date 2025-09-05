<x-layout-app title="Detalis Usuarios">
    <div class="container-fluid p-4 text-bg-light h-100 w-100">
        <h3 class="text-primary">Detalis Usuario</h3>
        <hr>
        <div class="row flex-column col-md-6 p-5">
            <div class="justify-self-center">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->role }}</p>
                <p><strong>CPF ou CNPJ:</strong> {{ \Illuminate\Support\Facades\Crypt::decryptString($user->cpf_cnpj) }}</p>
                <p><strong>Permissions:</strong></p>

                @php
                    $permissions = json_decode($user->permissions)
                @endphp

                    <!-- permissions -->
                <ul>
                    @foreach($permissions as $permission)
                        <li>{{ $permission }}</li>
                    @endforeach
                </ul>

                <p><strong>Departmento:</strong> {{ $user->department->name ?? " - " }}</p>

                <div>Active:
                    @empty($user->email_verified_at)
                        <p class="badge bg-danger"> No</p>
                    @else
                        <p class="badge bg-success"> Yes</p>
                    @endempty
                </div>
            </div>


            <div class="col">
                <p><strong>Logo Marca:</strong> {{ $user->empreendedor->logomarca }}</p>
                <p><strong>Telefone:</strong> {{ $user->empreendedor->phone }}</p>
                <p><strong>Endereço:</strong> {{ $user->empreendedor->address }}</p>
                <p><strong>N°:</strong> {{ $user->empreendedor->number }}</p>
                <p><strong>Bairro:</strong> {{ $user->empreendedor->bairro }}</p>
                <p><strong>Cidade:</strong> {{ $user->empreendedor->cidade }}</p>
                <p><strong>CEP:</strong> {{ $user->empreendedor->cep }}</p>
            </div>
            <button class="btn btn-outline-dark " onclick="window.history.back()"><i class="fas fa-arrow-left me-2"></i>Back</button>
        </div>
    </div>


</x-layout-app>


<x-layout-app title="Editar Colaborador">
    <div class="bg-light p-2">
        <h3 class="text-primary">Edite Colaborador</h3>
        <hr>
        <x-profile-user/>
        <hr>

        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-center p-5">
                <form action="{{ route('colaboration.update.colaborator') }}" method="post" class="form-floating col-md-8">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $colaborator->id }}">

                    <div class=" d-flex flex-wrap justify-content-between">
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" value="{{ $colaborator->name }}" placeholder="name@example.com">
                            <label for="floatingInput">Nome Completo:</label>
                            <div id="validationInput" class="form-text">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{ $colaborator->email }}">
                            <label for="floatingInput">Email: </label>
                            <div id="validationInput" class="form-text">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <div class="form-floating">
                                    <select class="form-select pe-5" id="select_department" name="select_department">
                                        @foreach ($departments as $department)

                                            @if($department->id != 1)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                    <label for="select_department">Cargo: </label>
                                    @error('select_department')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-4">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ $colaborator->adresses->phone }}" aria-describedby="validationInput">
                            <label for="floatingInput">Telefone: </label>
                            <div id="validationInput" class="form-text">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-10">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ $colaborator->adresses->address }}" aria-describedby="validationInput">
                            <label for="floatingInput">Endereço: </label>
                            <div id="validationInput" class="form-text">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-2">
                            <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ $colaborator->adresses->number }}">
                            <label for="floatingInput">N°: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('number')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ $colaborator->adresses->bairro }}">
                            <label for="floatingInput">Bairro: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('bairro')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-3">
                            <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ $colaborator->adresses->cep }}">
                            <label for="floatingInput">CEP: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('cep')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-10">
                            <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ $colaborator->adresses->cidade }}">
                            <label for="floatingInput">Cidade: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('cidade')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <button type="submit" class="btn btn-outline-primary mt-3 col-md-8">Alterar Colaborador</button>
                        <a href="{{ route('colaboration') }}" class="btn btn-outline-primary mt-3 col-md-1">Voltar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout-app>

<x-layout-app title="Adicionar Empreendedores">
    <div class="container-fluid text-bg-light h-100 w-100">
        <h3 class="text-primary">Novo Empreendedores</h3>
        <hr>
        <x-profile-user />
        <hr>
        <div class="d-flex justify-content-center col-md-12 w-100">
                <form class="col-md-8 mt-5" action="{{ route('empreendedor.submit.empreendedores') }}" method="post">
                    @csrf

                    <input type="hidden" name="colaborator_id" value="{{ auth()->user()->id }}">

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                    <div class="form-floating mb-3 col-md-6">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationInput" placeholder=" name@example.com" value="{{ old('name') }}">
                        <label for="validationInput" class="form-label">Nome Completo: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationInput" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="validationInput" class="form-label">Email: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                        <div class="form-floating mb-3 col-md-4">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('phone') }}">
                            <label for="floatingInput">Telefone: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                    <div class="form-floating mb-1 col-md-5">
                        <input type="text" name="logomarca" class="form-control @error('logomarca') is-invalid @enderror" id="validationInput" placeholder="Disabled name@example.com" value="{{ old('logomarca') }}">
                        <label for="validationInput" class="form-label">LogoMarca: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('logomarca')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-5">
                        <input type="text" name="cpf_cnpj" class="form-control @error('cpf_cnpj') is-invalid @enderror" id="validationInput" placeholder="Disabled name@example.com" value="{{ old('cpf_cnpj') }}">
                        <label for="validationInput" class="form-label">CPF ou CNPJ: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('cpf_cnpj')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-7">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('address') }}">
                        <label for="floatingInput">Endereço: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-2">
                        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('number') }}">
                        <label for="floatingInput">N°: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('number')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('bairro') }}">
                        <label for="floatingInput">Bairro: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('bairro')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-5">
                        <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('cidade') }}">
                        <label for="floatingInput">Cidade: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('cidade')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-3">
                        <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('cep') }}">
                        <label for="floatingInput">CEP: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('cep')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex">
                            <div class="pe-2">
                                <label for="select_department">Department</label>
                                <select class="form-select pe-5" id="select_department" name="select_department">
                                    @foreach ($departments as $department)

                                        @if($department->id != 1 && $department->id != 2)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endif

                                    @endforeach
                                </select>
                                @error('select_department')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

            </div>
                    <div class="d-flex flex-grow-1 justify-content-between">
                        <button type="submit" class="btn btn-outline-primary mt-4 mb-5">Cadastrar Empreendedor</button>
                        <a href="{{ route('empreendedor') }}" class="btn btn-outline-dark mt-4 mb-5">Voltar!</a>
                    </div>
                </form>
        </div>
    </div>
</x-layout-app>


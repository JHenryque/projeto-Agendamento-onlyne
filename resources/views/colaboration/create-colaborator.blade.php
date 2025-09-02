<x-layout-app title="Adicionar colaborador">
    <div class="container-fluid text-bg-light h-100 w-100">
            <h3 class="text-primary">Novo Colaborador</h3>
            <hr>
            <x-profile-user />
            <hr>
            <div class="d-flex flex-nowrap justify-content-center col-md-12">
                <form class="col-8" action="{{ route('colaboration.colaborator.submit') }}" method="post">
                    @csrf

                    <div class="form-floating mt-5 mb-3 col-5">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationInput" placeholder="Disabled name@example.com" value="{{ old('name') }}">
                        <label for="validationInput" class="form-label">Nome: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-4">
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

                    <div class="form-floating mb-3 col-md-5">
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

                    <div class="form-floating mb-3">
                        <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput" value="{{ old('bairro') }}">
                        <label for="floatingInput">Bairro: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('bairro')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-10">
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

                                        @if($department->id != 1)
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

                    <div class="d-flex flex-grow-1">
                        <button type="submit" class="btn btn-outline-primary mt-4 mb-5">Novo Colaborador</button>
                    </div>
                </form>
            </div>
    </div>
</x-layout-app>

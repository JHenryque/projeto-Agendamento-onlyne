<x-layout-app title="Adicionar colaborador">
    <div class="container-fluid text-bg-light h-100 w-100">
            <h3 class="text-primary">Novo Colaborador</h3>
            <hr>
            <x-profile-user />
            <hr>
            <div class="d-flex flex-nowrap justify-content-center col-md-12">
                <form class="col-8" action="#" method="post">

                    <div class="form-floating mt-5 mb-3 col-5">
                        <input type="email" name="name" class="form-control @error('name') is-invalid @enderror" id="validationInput" placeholder="Disabled name@example.com">
                        <label for="validationInput" class="form-label">Nome: </label>
                        <div id="validationInput" class="form-text">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-4">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationInput" placeholder="name@example.com">
                        <label for="validationInput" class="form-label">Email: </label>
                        <div id="validationInput" class="form-text">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">Telefone: </label>
                        <div id="validationInput" class="form-text">
                            @error('telefone')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-5">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">Endereço: </label>
                        <div id="validationInput" class="form-text">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-2">
                        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">N°: </label>
                        <div id="validationInput" class="form-text">
                            @error('number')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">Bairro: </label>
                        <div id="validationInput" class="form-text">
                            @error('bairro')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-10">
                        <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">Cidade: </label>
                        <div id="validationInput" class="form-text">
                            @error('cidade')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-md-3">
                        <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" aria-describedby="validationInput">
                        <label for="floatingInput">CEP: </label>
                        <div id="validationInput" class="form-text">
                            @error('cep')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
    </div>
</x-layout-app>

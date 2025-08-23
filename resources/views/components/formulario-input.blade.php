<div class=" d-flex flex-wrap justify-content-between">
    <div class="form-floating mb-3 col-md-6">
        <input type="text" readonly class="form-control-plaintext" id="floatingInput" value="{{ auth()->user()->name }}" placeholder="name@example.com">
        <label for="floatingInput">Nome Completo:</label>
    </div>

    <div class="form-floating mb-3 col-md-9">
        <input type="email" readonly class="form-control-plaintext" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->email }}">
        <label for="floatingInput">Email: </label>
    </div>

    <div class="form-floating mb-3 col-md-4">
        <input type="email" readonly class="form-control-plaintext" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->department->name }}">
        <label for="floatingInput">Cargo: </label>
    </div>

    <div class="form-floating mb-3 col-md-4">
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->phone }}" aria-describedby="validationInput">
        <label for="floatingInput">Telefone: </label>
        <div id="validationInput" class="form-text">
            @error('telefone')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-floating mb-3 col-md-10">
        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->address }}" aria-describedby="validationInput">
        <label for="floatingInput">Endereço: </label>
        <div id="validationInput" class="form-text">
            @error('address')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-floating mb-3 col-md-3">
        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->number }}" aria-describedby="validationInput">
        <label for="floatingInput">N°: </label>
        <div id="validationInput" class="form-text">
            @error('number')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->bairro }}" aria-describedby="validationInput">
        <label for="floatingInput">Bairro: </label>
        <div id="validationInput" class="form-text">
            @error('bairro')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-floating mb-3 col-md-10">
        <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->cidade }}" aria-describedby="validationInput">
        <label for="floatingInput">Cidade: </label>
        <div id="validationInput" class="form-text">
            @error('cidade')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-floating mb-3 col-md-3">
        <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->adresses->cep }}" aria-describedby="validationInput">
        <label for="floatingInput">CEP: </label>
        <div id="validationInput" class="form-text">
            @error('cep')
            {{ $message }}
            @enderror
        </div>
    </div>
</div>

<x-layout-guest title="Login">
    <div class="container vertical-Y">
        <div class="col-6 p-4 align-content-center">
            <div class="card p-4">

                <p>Para recuperar a sua senha, por favor indique o seu email. Irá receber um email com um link para recuperar a senha.</p>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com">
                        <label for="floatingInput">E-mail</label>
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-primary mt-4">Enviar</button>
                        <a class="mt-4" href="{{ route('login') }}">Voltar para login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout-guest>

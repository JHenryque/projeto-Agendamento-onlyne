<x-layout-guest title="Recupera a Senha">
    <div class="container vertical-Y">
        <div class="col-6 p-4 align-content-center">
            <div class="card p-4">

                @if(!session('status'))
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
                @else
                    <div class="alert alert-success text-center" role="alert">
                        Enviado com Sucesso!
                    </div>
                    <div class="text-center mb-5">
                        <p>Se está registrado nesta plataforma, irá receber um email com um link para recupera a senha</p>
                        <p class="mb-5">Por favor verifique a sua caixa de correio</p>
                        <a href="{{ route('login') }} " class="btn btn-primary">Voltar ao login</a>
                    </div>
                @endif



            </div>
        </div>
    </div>
</x-layout-guest>

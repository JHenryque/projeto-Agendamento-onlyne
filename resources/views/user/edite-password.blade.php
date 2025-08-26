<x-layout-app title="Alterar a Senha">
    <div class="container-fluid" style="min-height: 800px;">
        <div class="col-6 p-4 align-self-center h-100">
            <div class="card p-4 ">

                <div class="row align-content-center justify-items-center">
                    @if(!session('status'))
                        <p>Para Alterar a sua senha, por favor indique o seu email. Irá receber um email com um link para Alterar a senha.</p>
                        <form action="{{ route('user.profile.password.update') }}" method="post">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ auth()->user()->email }}">
                                <label for="floatingInput">E-mail</label>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary mt-4">Enviar</button>
                                <a href="{{ route('user.profile') }} " class="btn btn-primary">Voltar para Editar o perfil</a>
                            </div>
                        </form>
                    @else
                        <div class="text-center mb-5">
                            <p>Se está registrado nesta plataforma, irá receber um email com um link para recupera a senha</p>
                            <p class="mb-5">Por favor verifique a sua caixa de correio</p>
                            <a href="{{ route('home') }} " class="btn btn-primary">home</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-layout-app>

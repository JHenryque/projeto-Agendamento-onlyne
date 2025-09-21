<x-layout-app title="Alterar a Senha">
    <div class="container-fluid text-bg-light h-100" >
            <x-profile-user/>
            <hr>
        <div class="container col-md-6">
             <h1 class="py-5 text-primary-emphasis"><b><i class="fa-solid fa-envelopes-bulk me-3 text-warning"></i></b> Alterar Senha</h1>
            <div class="card p-4 mt-lg-5">

                <div class="row align-content-center justify-items-center">
                        <p>Para Alterar a sua senha, irá receber um email com um link para Alteração da senha.</p>
                        <form action="{{ route('user.profile.password.update') }}" method="post">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" name="email" readonly class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ auth()->user()->email }}">
                                <label for="floatingInput">E-mail</label>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <button class="btn btn-success mt-4">Enviar</button>
                                <a href="{{ route('home') }} " class="btn btn-outline-primary mt-4">voltar!</a>
                            </div>
                        </form>
                    @if(session('success'))
                        <div class="text-center mb-5 mt-5 text-bg-info">
                            <p class="mt-3">Você vai receber um link no email, o link para Altera a senha</p>
                            <p class="mb-3">Por favor verifique a sua caixa de correio</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-layout-app>

<x-layout-guest title="Altera a Senha">
    <div class="container vertical-Y">
        <div class="card p-5 align-self-center col-7">
            <h2 class="text-primary mb-4">Altera a senha</h2>

            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("email") }}">
                    <label for="floatingInput">E-mail</label>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("password") }}">
                    <label for="floatingInput">Password</label>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("password_confirmation") }}">
                    <label for="floatingInput">Confirme a Senha</label>
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary mt-4">Definir Senha</button>
                    <a class="mt-4" href="{{ route('login') }}">Voltar para login</a>
                </div>

            </form>
        </div>
    </div>
</x-layout-guest>

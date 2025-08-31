<x-layout-guest title="Bem-Vindo">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                {{--         logo         --}}
                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="200px">
                </div>
                {{--          Welcome message        --}}
                <div class="card p-5 text-center">
                    <p>Bem Vindo, <strong>{{ $user->name }}</strong>!</p>
                    <p>Sua conta foi criada com sucesso.</p>
                    <p>Volte para <a href="{{ route('login') }}">Login</a> para te acesso da sua conta.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout-guest>

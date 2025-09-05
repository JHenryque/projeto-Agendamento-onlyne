<x-layout-app title="Codigo ativaçao">
    <div class="container-fluid d-flex justify-content-center h-100" >
        <div class="d-flex justify-content-center col-md-12" style="min-height: 800px;">
            <div class="card col-md-6 align-self-center p-4 mt-4">
                <h2 class="text-primary mb-5">Codígo Ativação</h2>

                @if(!session('success'))
                    <p class="mt-3 text-center">Você vai receber o codígo de ativação no email, para altera a senha</p>
                    <p class="mb-3 text-center">Por favor verifique a sua caixa de correio</p>
                    <form action="{{ route('update.codigo.active') }}" method="post">
                        @csrf

                        <div class="d-flex justify-content-center flex-column align-items-center my-4">
                            <div class="form-floating mb-1 col-md-4">
                                <input type="text" name="number_activation" class="form-control @error('number_activation') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com">
                                <label for="floatingInput">Cole o codigo de ativação</label>
                                @error('number_activation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-4">Verificar!</button>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>

                        @endif
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <a href="{{ route('home') }} " class="btn btn-primary mt-4">Volta para Home</a>
                        </div>

                    </form>
                @else
                    <div class="alert alert-success text-center display-2">{{ session('success') }}</div>
                @endif

            </div>
        </div>

    </div>
</x-layout-app>


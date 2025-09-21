<x-layout-app title="Codigo ativaçao">
    <div class="container-fluid h-100 text-bg-light">
        <x-profile-user/>
        <hr>

        <div class="container col-md-6">
            <h1 class="text-dark"><i class="fa-solid fa-unlock-keyhole text-warning me-3 my-5"></i> Codígo Ativação</h1>

            <div class="card w-100 p-4 mt-4">

                @if(!session('success'))
                    <p class="mt-3 text-center">Você vai receber o codígo de ativação no email, para altera a senha</p>
                    <p class="mb-3 text-center">Por favor verifique a sua caixa de correio</p>
                    <form action="{{ route('update.codigo.active') }}" method="post">
                        @csrf

                        <div class="d-flex justify-content-center flex-column align-items-center my-4">
                            <div class="form-floating mb-1 ">
                                <input type="text" name="number_activation" class="form-control @error('number_activation') is-invalid @enderror col-md-4" id="floatingInputInvalid" placeholder="name@example.com">
                                <label for="floatingInput">Cole o codigo de ativação</label>
                                @error('number_activation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap justify-content-between col-md-7">
                                <button class="btn btn-success mt-4">Verificar!</button>
                                <a href="{{ route('user.profile.password') }} " class="btn btn-outline-dark mt-4">Volta!</a>
                            </div>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>

                        @endif

                    </form>
                @else
                    <div class="alert alert-success text-center display-2">{{ session('success') }}</div>
                @endif

            </div>
        </div>

    </div>
</x-layout-app>


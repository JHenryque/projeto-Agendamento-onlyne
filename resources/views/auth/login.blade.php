<x-layout-guest title="Login">
    <div class="container col-11 col-md-9">

       <div class="row align-items-center vertical-Y">

               <div class="card p-5">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-6">
                        <img src="{{ asset('assets/img/img-login.jpg') }}" alt="image login" width="600px">
                        <div class="card mx-lg-5">
                            <h2>Entre contatos com suporte</h2>
                        </div>
                    </div>

                    <div class="col-5">
                        <h2 class="mb-5 text-primary">LOGIN</h2>
                        <form action="{{ route('login')  }}" method="post">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("email") }}">
                                <label for="floatingInput">E-mail</label>
                                @error('email')
                                     <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="Password">
                                <label for="floatingPassword">Senha</label>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary mt-4">Entrar</button>
                                <a class="mt-4" href="{{ route('password.request') }}">Esquicir da senha!</a>
                            </div>
                        </form>
                    </div>
                </div>

               </div>

       </div>

    </div>
</x-layout-guest>

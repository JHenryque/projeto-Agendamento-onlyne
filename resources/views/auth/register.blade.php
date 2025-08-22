<x-layout-guest title="Cadastrar">
   <div class="container">
       <div class="card col-8 mt-4">
           <h2 class="m-3 text-primary text-center">Cadastrar conta</h2>
           <div class="row p-5">
               <form action="{{ route('register.store') }}" method="post">
                   @csrf

                   <div class="form-floating mb-3">
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="floatingInputInvalid" placeholder="name@example.com" value="{{ old("name") }}">
                       <label for="floatingInput">Nome: </label>
                       @error('name')
                       <div class="invalid-feedback text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="form-floating mb-3">
                       <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("email") }}">
                       <label for="floatingInput">E-mail:</label>
                       @error('email')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="form-floating mb-3">
                       <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com">
                       <label for="floatingInput">Senha:</label>
                       @error('password')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="form-floating mb-3">
                       <input type="password" name="confirmation" class="form-control @error('confirmation') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com">
                       <label for="floatingInput">Confirme a Senha:</label>
                       @error('confirmation')
                              <div class="invalid-feedback text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="d-flex align-items-center justify-content-between">
                       <button class="btn btn-primary mt-4">criar conta!</button>

                           <a class="mt-4" href="{{ route('login') }}">Voltar para Login!</a>

                   </div>

               </form>
           </div>

       </div>
   </div>
</x-layout-guest>

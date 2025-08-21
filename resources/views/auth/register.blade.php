<x-layout-guest title="Cadastrar">
   <div class="container">
       <div class="col-8 mt-4">
           <form action="#">
               @csrf

               <div class="form-floating mb-3">
                   <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("name") }}">
                   <label for="floatingInput">Nome:</label>
                   @error('name')
                   <p class="text-danger">{{ $message }}</p>
                   @enderror
               </div>

               <div class="form-floating mb-3">
                   <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("email") }}">
                   <label for="floatingInput">E-mail</label>
                   @error('email')
                   <p class="text-danger">{{ $message }}</p>
                   @enderror
               </div>

               <div class="form-floating mb-3">
                   <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInputInvalid" placeholder="name@example.com" value="{{ old("phone") }}">
                   <label for="floatingInput">Telefone:</label>
                   @error('phone')
                   <p class="text-danger">{{ $message }}</p>
                   @enderror
               </div>




           </form>
       </div>
   </div>
</x-layout-guest>

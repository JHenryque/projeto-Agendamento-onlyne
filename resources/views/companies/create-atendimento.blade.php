<x-layout-app title="Crear Tipo Atendimento">
    <div class="container-fluid h-100 text-bg-light p-2">
        <h3 class="text-bg-primary p-2">Criar tipo atendeimento</h3>
        <hr>
        <x-profile-client/>
        <hr>
        <div class="d-flex justify-content-center align-items-center h-50">
            <div class="card p-4">

               <form>
                   <div class="form-floating mb-3">
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('name') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Tipo atendimento: </label>
                       <div id="validationInput" class="form-text">
                           @error('name')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3 col-md-4">
                       <input type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="floatingInput" placeholder="preco@example.com" value="{{ old('preco') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Preço: </label>
                       <div id="validationInput" class="form-text">
                           @error('preco')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3">
                       <textarea type="text" name="observacao" class="form-control" id="floatingInput" placeholder="preco@example.com" style="height: 100px;resize: none;" aria-describedby="validationInput">{{ old('observacao') }}</textarea>
                       <label for="floatingInput">Observação Tipo Atendimento: </label>
                       <div id="validationInput" class="form-text">
                           <b>Obss:</b>  Coloque algum tipo de mensagem para orientar, <strong>"não é Opcional!"</strong>
                       </div>
                   </div>

                  <div class="my-3">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar <i class="fas fa-plus ms-2 text-bg-light text-dark p-1 rounded"></i></button>
                  </div>
               </form>
            </div>


            @if($tipoAtendimentos->count() === 0)
                <div>nao tem nada</div>
            @else
                <div class="row">
                    <ul>
                        @foreach($tipoAtendimentos as $tipoAtendimento)
                            <li>{{ $tipoAtendimento->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</x-layout-app>

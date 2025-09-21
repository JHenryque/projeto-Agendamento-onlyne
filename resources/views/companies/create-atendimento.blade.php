<x-layout-app title="Crear Tipo Atendimento">
    <div class="container-fluid h-100 text-bg-light p-2">
        <h3 class="text-bg-primary p-2">Criar tipo atendimento</h3>
        <hr>
        <x-profile-client/>
        <hr>
            @if(session('success'))
                <div class="alert bg-success alert-dismissible text-center fade show" role="alert">
                    <strong class="text-center">{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <div class="d-flex flex-wrap gap-4 justify-content-center align-items-center h-50">
            <div class="card p-4">

               <form action="{{ route('empreendedor.submit.atendimento') }}" method="post">
                   @csrf
                   <div class="form-floating mb-3">
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('name') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Tipo atendimento: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('name')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3 col-md-4">
                       <input type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" id="floatingInput" placeholder="preco@example.com" value="{{ old('preco') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Preço: </label>
                       <div id="validationInput" class="form-text text-danger">
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
                      <button type="submit" class="btn btn-sm btn-success">Salvar <i class="fas fa-plus ms-2 text-bg-primary p-1 rounded"></i></button>
                  </div>
               </form>
            </div>

            @if($tipoAtendimentos->count() === 0)
                <div class="text-center"></div>
            @else
                <div class="col-lg-5 text-bg-secondary p-4 rounded">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="d-flex flex-wrap">Tipo de Atendimentos:</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @foreach($tipoAtendimentos as $tipoAtendimento)
                            <tr>
                                <td class="d-flex justify-content-between lh-sm">
                                     <div class="row">
                                         <span><b>Nome:</b> {{ $tipoAtendimento->name }}</span>
                                         <span><b>Preço:</b> {{ $tipoAtendimento->preco }}</span>
                                         @if($tipoAtendimento->observacao)
                                             <p><b>Observação: </b> {{ $tipoAtendimento->observacao }}</p>
                                         @else
                                             {{ "" }}
                                         @endif
                                     </div>
                                    <div class="col-lg-2 d-flex flex-wrap align-self-center justify-content-end">
                                        <a href="{{ route('client.edit.atendimento', ['id' => $tipoAtendimento->id]) }}" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('client.deleted.atendimento', ['id'=> $tipoAtendimento->id]) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Understood</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-layout-app>

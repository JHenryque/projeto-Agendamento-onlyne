<x-layout-app title="Agendar Horario">
   <div class="container-fluid text-bg-light h-100">
       <x-profile-client />
       <hr>
       <div>
           <div class="container">
                   <h1 class="my-4">Novo Agendamento</h1>

               @if(session('erro'))
                   <div class="alert alert-danger">{{ session('erro') }}</div>
               @endif

               <form action="{{ route('agendamentos.submit.horarios') }}" method="POST">
                   @csrf
                   <div class="form-floating mb-3">
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('name') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Nome Completo: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('name')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3">
                       <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('phone') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Telefone: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('phone')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3">
                       <input type="date" name="data" class="form-control @error('data') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('data', date('Y-m-d')) }}" required aria-describedby="validationInput">
                       <label for="floatingInput">Data: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('data')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="mb-3">
                       <label>Tipo de Atendimento:</label>
                       <div class="d-flex flex-wrap mt-2 col-md-12">
                           @foreach($atendimentos as $atendimento)
                               <div class="card p-2 mb-2 me-2">
                                  <div class="d-flex flex-wrap align-items-center">
                                      <div class="d-flex flex-column pe-4">
                                          <span><b>Name:</b> {{ $atendimento->name }}</span>
                                          <span><b>Preço:</b> {{ $atendimento->preco }}</span>
                                          @if($atendimento->observacao)
                                              <p><b>Observacao:</b> {{ $atendimento->observacao }}</p>
                                          @endif
                                      </div>
                                      <div>
                                          <div class="form-check form-switch">
                                              <input class="form-check-input my-2" type="checkbox" name="atendimento[]" role="switch" id="validationInput" value="{{ $atendimento->id }}">
                                          </div>
                                      </div>
                                  </div>
                               </div>
                           @endforeach
                       </div>
                       <div id="validationInput" class="form-text text-danger">
                           @error('atendimento')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="mb-3">
                       <label>Horário:</label>
                       <div class="d-flex flex-wrap mt-2">
                           @if($horarios->count())
                               @foreach($horarios as $horario)

                                       <div class="card p-2 mb-2 me-2">
                                           <div class="d-flex flex-wrap align-items-center">
                                               <div class="d-flex flex-column pe-4">
                                                   <span><b>{{ $horario->times }}</b></span>
                                               </div>
                                               <div>
                                                   <div class="form-check">
                                                       <input class="form-check-input" type="radio" name="horario" id="exampleRadios2" value="{{ $horario->times }}">
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                               @endforeach
                           @else
                               <div class="form-text text-center">Nenhum horário disponível</div>
                           @endif
                       </div>
                       <div id="validationInput" class="form-text text-danger">
                           @error('horario')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>
                   <div class="d-flex flex-wrap justify-content-between mt-5 mb-5">
                       <button type="submit" class="btn btn-success">Agendar</button>
                       <a href="{{ route('home') }}" class="btn btn-outline-dark ">Voltar!</a>
                   </div>

               </form>
           </div>

           <script>
               document.getElementById('data').addEventListener('change', function() {
                   let data = this.value;
                   let selectHora = document.getElementById('hora');
                   selectHora.innerHTML = '<option>Carregando...</option>';

                   fetch(`/agendamentos/horarios-disponiveis?data=${data}`)
                       .then(res => res.json())
                       .then(horarios => {
                           selectHora.innerHTML = '';
                           if(horarios.length === 0){
                               selectHora.innerHTML = '<option>Nenhum horário disponível</option>';
                           } else {
                               horarios.forEach(hora => {
                                   let opt = document.createElement('option');
                                   opt.value = hora;
                                   opt.textContent = hora;
                                   selectHora.appendChild(opt);
                               });
                           }
                       });
               });
           </script>
       </div>
   </div>
</x-layout-app>

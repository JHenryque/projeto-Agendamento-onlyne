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

                   <div class="mb-3">
                       <label>Tipo de Atendimento:</label>
                       <div class="d-flex flex-wrap mt-2 col-md-12" id="validationInput">
                           @foreach($atendimentos as $atendimento)
                               <div class="card p-2 me-3 mb-3">
                                   <div class="form-check">
                                       <input class="form-check-input me-3" type="radio" name="atendimento" id="radioDefault{{ $atendimento->id }}" value="{{ $atendimento->id }}">
                                       <label class="form-check-label" for="radioDefault{{ $atendimento->id }}">
                                          <b>{{ $atendimento->name }}</b> <br> R${{ $atendimento->preco }} reais
                                           @if($atendimento->observacao)
                                               | {{ $atendimento->observacao }}
                                           @endif
                                       </label>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                       <div id="atendimento" class="form-text text-danger" id="validationInput">
                           @error('data')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                       <div class="mb-3">
                           <label class="form-label">Data: </label>
                           <div class="d-flex flex-wrap mt-2 col-md-12" id="validationInput">
                               @foreach($periods as $period)
                                   <div class="card p-2 me-2 mb-2">
                                       <div class="form-check">
                                           <input class="form-check-input me-3" type="radio" name="data" id="radioDefault{{ $period->format('d') }}" value="{{ $period->format('d-m-Y') }}">
                                           <label class="form-check-label d-flex flex-column align-items-center" for="radioDefault{{ $period->format('d') }}">
                                               <b class="border-bottom">{{ $period->translatedFormat('l') }}</b>
                                               <b class="border-bottom">Dia: {{ $period->format('d') }}</b>
                                               <b class="border-bottom">{{ $period->translatedFormat('F') }}</b>
                                               <b>Ano: {{ $period->format('Y') }}</b>
                                           </label>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                           <div id="datalistOptions" class="form-text text-danger">
                               @error('data')
                               {{ $message }}
                               @enderror
                           </div>
                       </div>

                   <div class="mb-3">
                       <label>Horário:</label>
                       <div class="d-flex flex-wrap mt-2">


                               @foreach($horarios as $horario)
                                   <div class="card p-2 mb-2 me-2">
                                           <div>
                                               <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="horario" id="horario{{ $horario->id }}" value="{{ $horario->times }}">
                                                   <label class="form-check-label" for="horario{{ $horario->id }}">
                                                       <b>{{ $horario->times }}</b>
                                                   </label>
                                               </div>
                                           </div>
                                   </div>

                               @endforeach

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
